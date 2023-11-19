<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('home', [
        'title' => 'STYLE STOCKROOM'
    ]);
});

Route::get('/product', function () {
    return view('product', [
        'title' => 'STYLE STOCKROOM | All Product',
        'products' => Product::productList()
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
