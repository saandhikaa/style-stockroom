<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ManageProductController extends Controller
{
    public function index()
    {
        return view('dashboard.manage-products.index', [
            'products' => Product::all()
        ]);
    }
    
    public function create()
    {
        return view('dashboard.manage-products.create', [
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
        return redirect('/dashboard/manage-products')->with('success', 'New product added successfully!');
    }
    
    public function show(Product $manage_product)
    {
        return view('dashboard.manage-products.show', [
            'product' => $manage_product
        ]);
    }
    
    public function edit(Product $manage_product)
    {
        $manage_product->sizesArray = $manage_product->sizes ? explode(',', $manage_product->sizes) : [];
        $manage_product->colorsArray = $manage_product->colors ? explode(',', $manage_product->colors) : [];
        
        return view('dashboard.manage-products.edit', [
            'product' => $manage_product,
            'categories' => Category::all()
        ]);
    }
    
    public function update(Request $request, Product $manage_product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'slug' => 'required|unique:products,slug,' . $manage_product->id,
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
        
        $manage_product->update($validatedData);
        return redirect('/dashboard/manage-products')->with('success', 'Product updated successfully!');
    }
    
    public function destroy(Product $manage_product)
    {
        if ($manage_product->image) {
            $imagePath = public_path('/images/' . $manage_product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        Product::destroy($manage_product->id);
        return redirect('/dashboard/manage-products')->with('success', 'Product deleted successfully!');
    }
    
    public function generateSlug (Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->data);
        return response()->json(['slug' => $slug]);
    }
}
