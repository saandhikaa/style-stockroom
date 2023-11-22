<?php

namespace App\Models;

class Product {
    private static $products = [
        [
            "productID" => "001",
            "name" => "Vintage Leather Jacket",
            "slug" => "vintage-leather-jacket",
            "category" => "Outerwear",
            "price" => "IDR 2,250,000",
            "description" => "A stylish vintage leather jacket for a timeless look.",
            "sizes" => "S, M, L, XL",
            "colors" => "Black, Brown"
        ],
        [
            "productID" => "002",
            "name" => "Slim Fit Jeans",
            "slug" => "slim-fit-jeans",
            "category" => "Pants",
            "price" => "IDR 1,200,000",
            "description" => "Comfortable and fashionable slim fit jeans.",
            "sizes" => "28, 30, 32, 34, 36",
            "colors" => "Blue, Black, Grey"
        ],
        [
            "productID" => "003",
            "name" => "Silk Scarf",
            "slug" => "silk-scraf",
            "category" => "Accessories",
            "price" => "IDR 675,000",
            "description" => "Elegant silk scarf with a beautiful pattern.",
            "sizes" => "One Size",
            "colors" => "Red, Blue, Green, Yellow"
        ]
    ];
    
    public static function productList() {
        return collect(self::$products);
    }
    
    public static function productDetail ($slug) {
        $products = static::productList();
        return $products->firstWhere('slug', $slug);
    }
}