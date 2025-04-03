<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); // Получаем запрос из формы
        $sort = $request->input('sort'); // Получаем тип сортировки

        // Базовый запрос с фильтрацией по названию
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
            '); // Сначала с фото, потом без фото, потом нет в наличии

        // Применяем сортировку
        if ($sort === 'cheap') {
            $results->orderBy('sale_price', 'asc'); // Сначала дешевые
        } elseif ($sort === 'expensive') {
            $results->orderBy('sale_price', 'desc'); // Сначала дорогие
        } elseif ($sort === 'alphabet') {
            $results->orderBy('name', 'asc'); // По алфавиту
        }

        $results = $results->paginate(12)->appends($request->query()); // Сохраняем параметры в пагинации

        return view('search', compact('results', 'query', 'sort'));
    }
}
