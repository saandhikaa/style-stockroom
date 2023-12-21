<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        
        return view('product', [
            'title' => 'All Product',
            'products' => Product::latest()->filter()->get()
        ]);
    }
    
    public function detail (Product $product) {
        return view('detail', [
            'title' => 'STYLE STOCKROOM | Product detail',
            'product' => $product
        ]);
    }
}