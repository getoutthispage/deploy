<?php


namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Корзина покупок Indigoshop.kz';
        $description = 'Просмотрите товары в вашей корзине и продолжите покупки. Доставка и возврат товаров по Алматы.';
        $keywords = 'корзина покупок, интернет-магазин, Алматы';

        return view('cart', compact('title', 'description', 'keywords'));
    }


    public function checkout(Request $request)
    {
        Log::info('Received order data:', $request->all()); // Логируем входные данные

        try {
            $validated = $request->validate([
		'name' => 'required|string|max:255',
    'phone' => 'required|string|max:20',
    'address' => 'required|string|max:255',
    'payment_option' => 'required|string|max:255',
    'items' => 'required|array',
    'items.*.id' => 'required|integer|exists:products,id',
    'items.*.quantity' => 'required|integer|min:1',
            ]);
        } catch (ValidationException $e) {
            Log::error('Validation failed:', $e->errors()); // Логируем ошибки
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
	$address = $validated['address'];
	$payment_option = $validated['payment_option'];
        $client = new Client();
        $counterpartyData = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];
        $response = $client->post('https://api.moysklad.ru/api/remap/1.2/entity/counterparty', [
            'headers' => [
                'Authorization' => 'Bearer ab8edcaafabcd9308789c8f135f7db96ee6b789c',
                'Accept-Encoding' => 'gzip',
                'Content-Type' => 'application/json',
            ],
            'json' => $counterpartyData,
            'verify' => false, // Отключаем проверку SSL
        ]);
        $body = json_decode($response->getBody(), true);

        $counterpartyHref = $body['meta']['href'] ?? null;
        if (!$counterpartyHref) {
            Log::error('Ошибка при создании контрагента');
            return response()->json(['error' => 'Ошибка при создании контрагента'], 500);
        }
        $productIds = collect($validated['items'])->pluck('id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $positions = [];
        foreach ($validated['items'] as $item) {
            $product = $products->get($item['id']);
            Log::debug('Обрабатываем продукт:', ['id' => $item['id'], 'product' => $product]);

            if ($product) {
                $metaHref = $product->meta_href;
                $salePrice = $product->sale_price;

                $positions[] = [
                    'quantity' => $item['quantity'],
                    'price' => $salePrice * $item['quantity'] * 100,
                    'assortment' => [
                        'meta' => [
                            'href' => $metaHref,
                            'type' => 'product',
                            'mediaType' => 'application/json',
                        ],
                    ],
                ];
            } else {
                Log::warning('Продукт не найден для ID: ' . $item['id']);
            }
        }
        $orderData = [
            'name' => $validated['name'],
            'organization' => [
                'meta' => [
                    'href' => 'https://api.moysklad.ru/api/remap/1.2/entity/organization/0460e57b-217e-11ee-0a80-08c7002536bd',
                    'type' => 'organization',
                    'mediaType' => 'application/json',
                ],
            ],
            'agent' => [
                'meta' => [
                    'href' => $counterpartyHref,
                    'type' => 'counterparty',
                    'mediaType' => 'application/json',
                ],
            ],
            'positions' => $positions, // Передаем массив позиций
'shipmentAddressFull' => [
		'comment' => "$address\n$payment_option",
            ]
        ];
        try {
            $responseOrder = $client->post('https://api.moysklad.ru/api/remap/1.2/entity/customerorder', [
                'headers' => [
                    'Authorization' => 'Bearer ab8edcaafabcd9308789c8f135f7db96ee6b789c',
                    'Accept-Encoding' => 'gzip',
                    'Content-Type' => 'application/json',
                ],
                'json' => $orderData,
                'verify' => false,
            ]);

            Log::info('Response from MoySklad', [
                'status' => $responseOrder->getStatusCode(),
                'body' => $responseOrder->getBody()->getContents()
            ]);
        } catch (GuzzleException $e) {
            Log::error('MoySklad API error', [
                'error' => $e->getMessage()
            ]);
        }


        return response()->json(['success' => true, 'message' => 'Заказ успешно оформлен']);

    }


}
