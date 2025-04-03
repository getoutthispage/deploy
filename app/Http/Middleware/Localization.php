<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class Localization
{
    public function handle($request, Closure $next)
    {
        Log::info('1 Текущая локаль: ' . App::getLocale());

        // Получаем локаль из URL
        $locale = $request->segment(2); // Предполагается, что локаль находится на втором уровне URL

        // Проверяем, является ли локаль допустимой
        if (in_array($locale, ['ru', 'kk'])) {
            App::setLocale($locale);
            Log::info('2 Локаль установлена: ' . $locale);
        } else {
            Log::warning(' 3Недопустимая локаль: ' . $locale);
        }
        Log::info('4 Текущая локаль: ' . App::getLocale());

        return $next($request); // Продолжаем выполнение запроса
    }
}
