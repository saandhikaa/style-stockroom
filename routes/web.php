<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Dashboard\ManageProductController;

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

Route::get('/categories', function (Category $category) {
    return view('categories.index', [
        'title' => 'STYLE STOCKROOM | Categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/manage-products/generateSlug', [ManageProductController::class, 'generateSlug']);
Route::resource('/dashboard/manage-products', ManageProductController::class)->middleware('admin');
