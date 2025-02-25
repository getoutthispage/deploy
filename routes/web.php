<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DeliveryPageController;
use App\Http\Controllers\FeedbackPageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WarrantyPageController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
Route::get('/sitemap.xml', [SitemapController::class, 'index']);


// INDEX PAGE
Route::get('/', [IndexController::class, 'index'])->name('home');


// PRODUCT PAGE
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Category page
Route::get('/shop/{slug1}/{slug2?}/{slug3?}', [CatalogController::class, 'show'])->name('category.show');

// Cart page
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/checkout', [CartController::class, 'checkout']);

// Delivery page
Route::get('/delivery', [DeliveryPageController::class, 'index'])->name('delivery');
// About us page
Route::get('/about', [AboutPageController::class, 'index'])->name('about');
// feedback page
Route::get('/feedback', [FeedbackPageController::class, 'index'])->name('feedback');
// warranty page
Route::get('/warranty', [WarrantyPageController::class, 'index'])->name('warranty');

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/robots.txt', function () {
    $content = app()->environment('production') ? <<<EOT
Disallow: /cart
Disallow: /checkout
Disallow: /admin
Disallow: /dashboard
Disallow: /password-reset
Disallow: /search
Disallow: /api/
Disallow: /_debugbar/
Disallow: /*?*
Allow: /
Sitemap: http://192.168.0.4:8080/sitemap.xml
EOT
        : "User-agent: *\nDisallow: /";

    return response($content)->header('Content-Type', 'text/plain');
});
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
