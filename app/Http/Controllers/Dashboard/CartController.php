<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Auth;

class CartController extends Controller
{
    public function add (Request $request, Product $product)
    {
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;
        
        $cart->save();
        
        return back()->with('success', "Product added to cart successfully!");
    }
}