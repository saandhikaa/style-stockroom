<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        return view('product', [
            'title' => 'STYLE STOCKROOM | All Product',
            'products' => Product::all()
        ]);
    }
    
    public function detail (Product $product) {
        return view('detail', [
            'title' => 'STYLE STOCKROOM | Product detail',
            'product' => $product
        ]);
    }
}