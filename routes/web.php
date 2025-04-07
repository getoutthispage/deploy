<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AboutPageController,
    CartController,
    CatalogController,
    DeliveryPageController,
    FeedbackPageController,
    IndexController,
    ProductController,
    SearchController,
    SitemapController,
    SocialProgramPageController,
    WarrantyPageController
};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Middleware\AdminMiddleware;

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Локализованные маршруты (ru/kz/en)
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localization']], function () {

    // Главная страница
    Route::get('/', [IndexController::class, 'index'])->name('home');

    // Продуктовая страница
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

    // Категории
    Route::get('/shop/{slug1}/{slug2?}/{slug3?}', [CatalogController::class, 'show'])->name('category.show');

    // Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Инфо страницы
    Route::get('/delivery', [DeliveryPageController::class, 'index'])->name('delivery');
    Route::get('/about', [AboutPageController::class, 'index'])->name('about');
    Route::get('/feedback', [FeedbackPageController::class, 'index'])->name('feedback');
    Route::get('/warranty', [WarrantyPageController::class, 'index'])->name('warranty');
    Route::get('/social-program', [SocialProgramPageController::class, 'index'])->name('social-program');

    // Поиск
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
    // В файле routes/web.php
    Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
        Route::get('/admin/console', function () {
            return view('admin.console'); // Убедитесь, что этот шаблон существует
        })->name('admin.console');
    });



});
