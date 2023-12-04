<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(2)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Category::create([
            "name" => "Outerwear",
            "slug" => "outerwear"
        ]);
        
        Category::create([
            "name" => "Pants",
            "slug" => "pants"
        ]);
        
        Category::create([
            "name" => "Accessories",
            "slug" => "accessories"
        ]);
        
        Category::create([
            "name" => "Dresses",
            "slug" => "dresses"
        ]);
        
        Category::create([
            "name" => "Footwear",
            "slug" => "footwear"
        ]);
        
        Category::create([
            "name" => "Tops",
            "slug" => "tops"
        ]);
        
        
        Product::create([
            "name" => "Vintage Leather Jacket",
            "slug" => "vintage-leather-jacket",
            "category_id" => 1,
            "price" => 2250000,
            "description" => "A stylish vintage leather jacket for a timeless look.",
            "sizes" => "S, M, L, XL",
            "colors" => "Black, Brown"
        ]);
        
        Product::create([
            "name" => "Slim Fit Jeans",
            "slug" => "slim-fit-jeans",
            "category_id" => 2,
            "price" => 1200000,
            "description" => "Comfortable and fashionable slim fit jeans.",
            "sizes" => "28, 30, 32, 34, 36",
            "colors" => "Blue, Black, Grey"
        ]);
        
        Product::create([
            "name" => "Classic Denim Jacket",
            "slug" => "classic-denim-jacket",
            "category_id" => 1,
            "price" => 1250000,
            "description" => "A classic denim jacket for a casual look.",
            "sizes" => "S, M, L, XL",
            "colors" => "Blue, Black"
        ]);
        
        Product::create([
            "name" => "Silk Scarf",
            "slug" => "silk-scarf",
            "category_id" => 3,
            "price" => 675000,
            "description" => "Elegant silk scarf with a beautiful pattern.",
            "sizes" => "One Size",
            "colors" => "Red, Blue, Green, Yellow"
        ]);
        
        Product::create([
            "name" => "Wool Scarf",
            "slug" => "wool-scarf",
            "category_id" => 3,
            "price" => 500000,
            "description" => "Warm wool scarf for the cold weather.",
            "sizes" => "One Size",
            "colors" => "Red, Blue, Green, Yellow"
        ]);
        
        Product::create([
            "name" => "High Waist Jeans",
            "slug" => "high-waist-jeans",
            "category_id" => 2,
            "price" => 950000,
            "description" => "Stylish high waist jeans for a trendy look.",
            "sizes" => "28, 30, 32, 34, 36",
            "colors" => "Blue, Black, Grey"
        ]);
        
        Product::create([
            "name" => "Leather Boots",
            "slug" => "leather-boots",
            "category_id" => 5,
            "price" => 1900000,
            "description" => "Stylish and durable leather boots.",
            "sizes" => "38, 39, 40, 41, 42",
            "colors" => "Black, Brown"
        ]);
        
        Product::create([
            "name" => "Floral Summer Dress",
            "slug" => "floral-summer-dress",
            "category_id" => 4,
            "price" => 850000,
            "description" => "Light and breezy summer dress with a beautiful floral pattern.",
            "sizes" => "S, M, L, XL",
            "colors" => "Red, Blue, Yellow"
        ]);
        
        Product::create([
            "name" => "Canvas Belt",
            "slug" => "canvas-belt",
            "category_id" => 3,
            "price" => 150000,
            "description" => "Versatile canvas belt.",
            "sizes" => "One Size",
            "colors" => "Black, Brown, Blue"
        ]);
        
        Product::create([
            "name" => "Cotton T-Shirt",
            "slug" => "cotton-t-shirt",
            "category_id" => 6,
            "price" => 200000,
            "description" => "Comfortable cotton t-shirt for everyday wear.",
            "sizes" => "S, M, L, XL",
            "colors" => "White, Black, Grey"
        ]);
    }
}
