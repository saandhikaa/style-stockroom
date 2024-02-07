<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardProductController;

use App\Models\Product;
use App\Models\Category;

Route::get('/', function () {
    return view('pages.home', [
        'title' => 'STYLE STOCKROOM'
    ]);
});

Route::get('/contact', function () {
    return view('pages.contact', [
        'title' => 'STYLE STOCKROOM | Contact'
    ]);
});

Route::get('/about', function () {
    return view('pages.about', [
        'title' => 'STYLE STOCKROOM | About'
    ]);
});


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'detail']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/products/generateSlug', [DashboardProductController::class, 'generateSlug']);
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('admin');

Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'STYLE STOCKROOM | Categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('product', [
        'title' => 'Product in ' . $category->name,
        'products' => $category->product->load('category')
    ]);
});
