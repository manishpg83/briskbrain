<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\PageMetadataController;



Auth::routes();
Route::get('/widget-demo', function () {
    return view('widget-demo');
});

Route::get('/clear-all-cache/{secret}', function ($secret) {
    if ($secret !== env('CACHE_CLEAR_SECRET')) {
        abort(403, 'Unauthorized.');
    }

    Artisan::call('optimize:clear');
    return response('✅ All caches cleared.', 200);
});
Route::post('/submit-form', [HomeController::class, 'submitForm'])->name('submit.form');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/clear-config-cache', [HomeController::class, 'clearConfigCache']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('thankyou');
Route::post('/contact', [HomeController::class, 'sendEmail'])->name('contact.submit');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/services', [HomeController::class, 'service'])->name('services');
Route::get('/yii-yii2-development', [HomeController::class, 'Yii'])->name('yii-yii2-development');
Route::get('/codeigniter-development', [HomeController::class, 'Codeigniter'])->name('codeigniter-development');
Route::get('/python-development', [HomeController::class, 'python'])->name('python-development');
Route::get('/laravel-development', [HomeController::class, 'Laravel'])->name('laravel-development');
Route::get('/magento-development', [HomeController::class, 'Magento'])->name('magento-development');
Route::get('/wordpress-development', [HomeController::class, 'WordPress'])->name('wordpress-development');
Route::get('/custom-php-development', [HomeController::class, 'PHP'])->name('custom-php-development');

/* Route::get('/', function () {
    return redirect()->route('home');
}); */

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blogsingle/{slug}', [FrontendController::class, 'blogsingle'])->name('blogsingle');

//For Comments
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/edit-category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/add-post', [PostController::class, 'create']);
    Route::post('/add-post', [PostController::class, 'store']);
    Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('edit-post');
    Route::put('/update-post/{post}', [PostController::class, 'update'])->name('update-post');
    Route::delete('/delete-post/{post}', [PostController::class, 'destroy'])->name('delete-post');

    Route::get('/settings', [SettingsController::class, 'index']);
    Route::post('/settings', [SettingsController::class, 'savedata']);

    //Route::resource('/page-metadata', PageMetadataController::class);
    Route::get('/page-metadata', [PageMetadataController::class, 'index'])->name('admin.page-metadata.index');

    Route::get('/page-metadata/get-metadata', [PageMetadataController::class, 'getMetadata']);

    Route::get('/page-metadata/create', [PageMetadataController::class, 'create'])->name('admin.page-metadata.create');
    Route::post('admin/page-metadata', [PageMetadataController::class, 'store'])->name('admin.page-metadata.store');
    Route::get('admin/page-metadata/{id}/edit', [PageMetadataController::class, 'edit'])
        ->name('admin.page-metadata.edit');
    Route::delete('admin/page-metadata/{id}', [PageMetadataController::class, 'destroy'])
        ->name('admin.page-metadata.destroy');
    Route::put('admin/page-metadata/{id}', [PageMetadataController::class, 'update'])
        ->name('admin.page-metadata.update');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

});