<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::where('name', 'LIKE', '%Фен Mantianyou%')
            ->take(10)
            ->get();
        return view('index', compact('categories', 'products'));
    }
}
