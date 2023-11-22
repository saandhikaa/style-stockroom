<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        return view('product', [
            'title' => 'STYLE STOCKROOM | All Product',
            'products' => Product::productList()
        ]);
    }
}