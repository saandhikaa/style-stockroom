<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'STYLE STOCKROOM'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'STYLE STOCKROOM | Contact'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'STYLE STOCKROOM | Contact'
    ]);
});
