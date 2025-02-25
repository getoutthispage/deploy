<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Главная страница
        $xml .= '<url>';
        $xml .= '<loc>' . url('/') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>'; // Добавляем сегодняшнюю дату
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';


        // Товары
        $products = Product::select('slug', 'updated_at', 'created_at')->get();
        foreach ($products as $product) {
            $xml .= '<url>';
            $xml .= '<loc>' . url($product->slug) . '</loc>';

            // Используем updated_at, если его нет — берем created_at
            $lastmod = $product->updated_at ?? $product->created_at;
            if ($lastmod) {
                $xml .= '<lastmod>' . Carbon::parse($lastmod)->toAtomString() . '</lastmod>';
            }

            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        // Категории
        $categories = Category::select('slug', 'updated_at', 'created_at')->get();
        foreach ($categories as $category) {
            $xml .= '<url>';
            $xml .= '<loc>' . url('/shop/' . $category->slug) . '</loc>';

            // Используем updated_at, если его нет — берём created_at
            $lastmod = $category->updated_at ?? $category->created_at;
            if ($lastmod) {
                $xml .= '<lastmod>' . Carbon::parse($lastmod)->toAtomString() . '</lastmod>';
            }

            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return Response::make($xml, 200)->header('Content-Type', 'application/xml');
    }
}
