<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller {
    public function index() {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        
        return view('product', [
            'title' => 'All Product' . $title,
            'products' => Product::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()
        ]);
    }
    
    public function detail (Product $product) {
        return view('detail', [
            'title' => 'STYLE STOCKROOM | Product detail',
            'product' => $product
        ]);
    }
}