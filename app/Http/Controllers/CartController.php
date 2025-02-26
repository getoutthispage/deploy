<?php

namespace App\Http\Controllers;

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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
//            'payment_option' => 'required|string|max:255',
            'items' => 'required|array',
            'items.*.id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

//        $paymentOptions = [
//            'cash' => 'Наличный расчет в точке самовывоза',
//            'card' => 'Безналичный расчет картой',
//            'kaspi_qr' => 'Оплата Kaspi QR (kaspi gold, kaspi рассрочка, kaspi red)',
//            'remote' => 'Удаленная оплата',
//        ];

//        $comment = $paymentOptions[$data['payment_option']] ?? 'Неизвестный способ оплаты';
        $productIds = collect($data['items'])->pluck('id');
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $address = $data['address'];
        $counterpartyData = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];
        $client = new Client();

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
        $positions = [];
        foreach ($data['items'] as $item) {
            $product = $products->get($item['id']);

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
        Log::info($address);
        // Данные для создания заказа
        $orderData = [
            'name' => $data['name'],
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
                'street' => $address,
//                'comment' => $comment,
            ],
//            "attributes" => [
//                "meta" => [
//                    "href" => "https://api.moysklad.ru/api/remap/1.2/entity/product/metadata/attributes/0ae972f0-2951-11ef-ac12-000e00000001",
//                    "type" => "attributemetadata",
//                    "mediaType" => "application/json",
//                ],

//            ]
        ];

        // Отправка заказа в МойСклад
        $responseOrder = $client->post('https://api.moysklad.ru/api/remap/1.2/entity/customerorder', [
            'headers' => [
                'Authorization' => 'Bearer ab8edcaafabcd9308789c8f135f7db96ee6b789c',
                'Accept-Encoding' => 'gzip',
                'Content-Type' => 'application/json',
            ],
            'json' => $orderData,
            'verify' => false,
        ]);

        // Получаем ответ
        $orderBody = json_decode($responseOrder->getBody(), true);
        $orderHref = $orderBody['meta']['href'] ?? null;

        if ($orderHref) {
            Log::info('Заказ успешно создан: ' . $orderHref);
            return response()->json(['success' => true, 'order_href' => $orderHref]);
        }
        Log::error('Ошибка при создании заказа: ' . json_encode($orderBody, JSON_UNESCAPED_UNICODE));
        return response()->json(['error' => 'Ошибка при создании заказа'], 500);
    }
}
