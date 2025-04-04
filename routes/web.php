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
use App\Http\Controllers\SocialProgramPageController;
use App\Http\Controllers\WarrantyPageController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Импортируем Session
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/sitemap.xml', [SitemapController::class, 'index']);


// INDEX PAGE
Route::get('/', [IndexController::class, 'index'])->name('home');


// PRODUCT PAGE
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Category page
Route::get('/shop/{slug1}/{slug2?}/{slug3?}', [CatalogController::class, 'show'])->name('category.show');

// Cart page
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Delivery page
Route::get('/delivery', [DeliveryPageController::class, 'index'])->name('delivery');
// About us page
Route::get('/about', [AboutPageController::class, 'index'])->name('about');
// feedback page
Route::get('/feedback', [FeedbackPageController::class, 'index'])->name('feedback');
// warranty page
Route::get('/warranty', [WarrantyPageController::class, 'index'])->name('warranty');
// social program page
Route::get('/social-program', [SocialProgramPageController::class, 'index'])->name('social-program');

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




Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// lang

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
});