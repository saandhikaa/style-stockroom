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
    
    public function remove (Request $request, Cart $cart)
    {
        if (Auth::id() !== $cart->user_id) {
            return back()->with('error', "You do not have permission to remove this item.");
        }
        
        $cart->delete();
        
        return back()->with('success', "Product removed from cart successfully!");
    }
}