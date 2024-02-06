<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => 'image|file|max:2048',
            'sizes' => 'required|array',
            'colors' => 'required|array',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $name);
            $validatedData['image'] = 'product/' . $name;
        }
        
        $validatedData['sizes'] = count($request->sizes) == 1 ? 'One size' : implode(', ', $request->sizes);
        $validatedData['colors'] = count($request->colors) == 1 ? 'One color' : implode(', ', $request->colors);
        $validatedData['description'] = empty($request->description) ? 'No description' : $request->description;
        
        Product::create($validatedData);
        return redirect('/dashboard/products')->with('success', 'New product added successfully!');
    }
    
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }
    
    public function edit(Product $product)
    {
        $product->sizesArray = $product->sizes ? explode(',', $product->sizes) : [];
        $product->colorsArray = $product->colors ? explode(',', $product->colors) : [];
        
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }
    
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'slug' => 'required|unique:products,slug,' . $product->id,
            'image' => 'image|file|max:2048',
            'sizes' => 'required|array',
            'colors' => 'required|array',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($request->oldImage) {
                $oldImagePath = public_path('/images/' . $request->oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Store the new image file in the public directory
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $name);
            $validatedData['image'] = 'product/' . $name;
        }
        
        $validatedData['sizes'] = count($request->sizes) == 1 ? 'One size' : implode(', ', $request->sizes);
        $validatedData['colors'] = count($request->colors) == 1 ? 'One color' : implode(', ', $request->colors);
        $validatedData['description'] = empty($request->description) ? 'No description' : $request->description;
        
        $product->update($validatedData);
        return redirect('/dashboard/products')->with('success', 'Product updated successfully!');
    }
    
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/dashboard/products')->with('success', 'Product deleted successfully!');
    }
    
    public function generateSlug (Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->data);
        return response()->json(['slug' => $slug]);
    }
}
