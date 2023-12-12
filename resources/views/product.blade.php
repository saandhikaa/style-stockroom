@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-8 text-center">{{ $title }}</h1>
    @if ($products->count())
        <div class="container mx-auto my-8 p-8 max-w-2xl border-2 border-blue-400 rounded">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight"><a href="/products/{{ $products[0]->slug }}" class="text-blue-600 hover:text-blue-700">{{ $products[0]->name }}</a></h2>
            <p class="text-gray-600 mb-2">in <a href="/categories/{{ $products[0]->category->slug }}" class="text-blue-500 hover:text-blue-600">{{ $products[0]->category->name }}</a></p>
            <p class="text-gray-800 font-bold">{{ $products[0]->price }}</p>
            <p class="italic text-gray-600">"{{ $products[0]->description }}"</p>
        </div>
    @endif
    
    <ul>
        @foreach ($products->skip(1) as $product)
        <li class="mb-10">
            <h2 class="font-semibold text-xl"><a href="/products/{{ $product->slug }}" class="text-blue-600">{{ $product->name }}</a></h2>
            <p class="mb-2">in <a href="/categories/{{ $product->category->slug }}" class="text-blue-500">{{ $product->category->name }}</a></p>
            <p>{{ $product->price }}</p>
            <p class="italic">"{{ $product->description }}"</p>
        </li>
        @endforeach
    </ul>
@endsection