<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;

Route::get('/', function () {
    return view('home', [
        'title' => 'STYLE STOCKROOM'
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product:slug}', [ProductController::class, 'detail']);

Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'STYLE STOCKROOM | Categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title' => 'STYLE STOCKROOM | ' . $category->name,
        'products' => $category->product,
        'category' => $category->name
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
