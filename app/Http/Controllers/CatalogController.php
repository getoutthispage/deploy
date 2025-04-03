<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show(Request $request, $slug1, $slug2 = null, $slug3 = null)
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
            ->where('is_hidden', false)
            ->get();
    
        $title = $category->seo_title ?? $category->name . ' – купить в Алматы';
        $description = $category->seo_description ?? 'Купить ' . strtolower($category->name) . ' в Алматы. Доступные цены, доставка, широкий выбор!';
        $keywords = $category->seo_keywords ?? strtolower($category->name) . ', купить ' . strtolower($category->name) . ', Алматы, парикмахерские инструменты';
    
        if ($subcategories->isEmpty()) {
            $query = Product::where('pathname', $category->pathname);
    
            // Получаем параметр сортировки из запроса
            $sort = $request->input('sort');


            switch ($sort) {
                case 'cheap':
                    $query->orderByRaw('quantity > 0 DESC, images IS NOT NULL DESC, sale_price ASC');
                    break;
                case 'expensive':
                    $query->orderByRaw('quantity > 0 DESC, images IS NOT NULL DESC, sale_price DESC');
                    break;
                case 'alphabet':
                    $query->orderByRaw('quantity > 0 DESC, images IS NOT NULL DESC, name ASC');
                    break;
                default:
                    $query->orderByRaw('quantity > 0 DESC, images IS NOT NULL DESC');
                    break;
            }
    
            $products = $query->paginate(12);
    
            return view('catalog', compact('category', 'products', 'title', 'description', 'keywords', 'sort'));
        }
    
        return view('category', compact('category', 'subcategories', 'title', 'description', 'keywords'));
    }
    

}
