<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Формируем динамические мета-теги для товара
        $title = $product->seo_title ?? $product->name . ' – купить в Алматы';
        $description = $product->seo_description ?? 'Купить ' . strtolower($product->name) . ' по доступной цене в Алматы. Доставка и высокий ассортимент!';
        $keywords = $product->seo_keywords ?? strtolower($product->name) . ', купить ' . strtolower($product->name) . ', Алматы';

        return view('product', compact('product', 'title', 'description', 'keywords'));
    }
}
