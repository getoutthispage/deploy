<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show($slug1, $slug2 = null, $slug3 = null)
    {
        $category = Category::where('slug', $slug1)->firstOrFail();

        if ($slug2) {
            $category = Category::where('slug', $slug2)
                ->where('parent_id', $category->id)
                ->firstOrFail();
        }

        if ($slug3) {
            $category = Category::where('slug', $slug3)
                ->where('parent_id', $category->id)
                ->firstOrFail();
        }

        $subcategories = Category::where('parent_id', $category->id)
            ->where('is_hidden', false) // Исключаем скрытые категории
            ->get();


        // Формируем динамические мета-теги
        $title = $category->seo_title ?? $category->name . ' – купить в Алматы';
        $description = $category->seo_description ?? 'Купить ' . strtolower($category->name) . ' в Алматы. Доступные цены, доставка, широкий выбор!';
        $keywords = $category->seo_keywords ?? strtolower($category->name) . ', купить ' . strtolower($category->name) . ', Алматы, парикмахерские инструменты';

        if ($subcategories->isEmpty()) {
            $products = Product::where('pathname', $category->pathname)
                ->orderByRaw('(images IS NULL OR NULLIF(images, \'\') IS NULL) ASC, quantity <= 0 ASC')
                ->paginate(12);

            return view('catalog.show', compact('category', 'products', 'title', 'description', 'keywords'));
        }

        return view('category.show', compact('category', 'subcategories', 'title', 'description', 'keywords'));
    }

}
