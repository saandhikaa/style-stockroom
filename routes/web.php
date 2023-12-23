<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

use App\Models\Product;
use App\Models\Category;

Route::get('/', function () {
    return view('home', [
        'title' => 'STYLE STOCKROOM'
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'detail']);

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegistrationController::class, 'index']);

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

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'STYLE STOCKROOM | Contact'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'STYLE STOCKROOM | About'
    ]);
});
