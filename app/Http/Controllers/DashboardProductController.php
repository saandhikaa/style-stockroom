<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::all()
        ]);
    }
    
    public function create()
    {
        return view('dashboard.products.create', [
            'categories' => Category::all()
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'slug' => 'required|unique:products',
            'sizes' => 'required|array',
            'colors' => 'required|array',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        
        // Additional data to merge with the validated data
        $additionalData = [
            'sizes' => count($request->sizes) == 1 ? 'One size' : implode(',', $request->sizes),
            'colors' => count($request->colors) == 1 ? 'One color' : implode(',', $request->colors),
            'description' => empty($request->description) ? 'No description' : $request->description,
        ];
        
        // Merge additional data with the validated data using the original $request
        $mergedData = $request->merge($additionalData)->all();
        
        Product::create($mergedData);
        
        return redirect('/dashboard/products')->with('added', 'New product added successfully!');
    }

    
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function generateSlug (Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->data);
        return response()->json(['slug' => $slug]);
    }
}
