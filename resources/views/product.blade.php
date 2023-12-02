@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-8 text-center">Product List</h1>
    <ul>
        @foreach ($products as $product)
        <li class="mb-6">
            <h2 class="font-semibold text-xl">{{ $product->name }}</h2>
            <p>{{ $product->price }}</p>
            <p class="italic">"{{ $product->description }}"</p>
            <p class="mb-2">Category: {{ $product->category->name }}</p>
            <a href="/product/{{ $product->slug }}" class="text-blue-600">More info..</a>
        </li>
        @endforeach
    </ul>
@endsection