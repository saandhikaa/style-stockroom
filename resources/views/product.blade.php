@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-8 text-center">{{ $title }}</h1>
    
    <div class="container mx-auto">
        <form action="/products" method="get" class="flex">
            <input id="search" type="text" name="search" placeholder="Search..." value="{{ request('query') }}" class="flex-grow border-2 border-gray-300 p-2 rounded-l-md focus:border-blue-500 focus:outline-none">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-md">Search</button>
        </form>
    </div>
    
    @if ($products->count())
        <div class="container mx-auto my-8 p-8 max-w-2xl border-2 border-blue-400 rounded">
            <img src="https://source.unsplash.com/1000x1000/?{{ $products[0]->category->name }}" alt="{{ $products[0]->name }}" class="mb-4 rounded">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight"><a href="/products/{{ $products[0]->slug }}" class="text-blue-600 hover:text-blue-700">{{ $products[0]->name }}</a></h2>
            <p class="text-gray-600 mb-2">in <a href="/products?category={{ $products[0]->category->slug }}" class="text-blue-500 hover:text-blue-600">{{ $products[0]->category->name }}</a></p>
            <p class="text-gray-800 font-bold">{{ $products[0]->price }}</p>
            <p class="italic text-gray-600">"{{ $products[0]->description }}"</p>
        </div>
        
        <ul class="grid grid-cols-2 gap-4">
            @foreach ($products->skip(1) as $product)
            <li class="border border-blue-400 rounded p-4">
                <img src="https://source.unsplash.com/1000x1000/?{{ $product->category->name }}" alt="{{ $products[0]->name }}" class="mb-4 rounded">
                <h2 class="font-semibold text-xl"><a href="/products/{{ $product->slug }}" class="text-blue-600">{{ $product->name }}</a></h2>
                <p class="mb-2">in <a href="/products?category={{ $product->category->slug }}" class="text-blue-500">{{ $product->category->name }}</a></p>
                <p>{{ $product->price }}</p>
                <p class="italic">"{{ $product->description }}"</p>
            </li>
            @endforeach
        </ul>
    @else
        <h3 class="text-2xl text-gray-500 my-8 text-center">404</h3>
    @endif
@endsection