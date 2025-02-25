<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); // Получаем запрос из формы

        $results = Product::whereRaw('LOWER(name) LIKE LOWER(?)', ["%{$query}%"])
            ->orderByRaw('
        CASE
            WHEN LENGTH(images) = 0 OR images IS NULL THEN 1
            ELSE 0
        END,
        CASE
            WHEN quantity = 0 THEN 1
            ELSE 0
        END
    ') // Сначала с фото, потом без фото, потом нет в наличии
            ->paginate(15);


        return view('search', compact('results', 'query'));
    }
}
