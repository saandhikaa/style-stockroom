@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-8 text-center">{{ $title }}</h1>
    <ul>
        @foreach ($products as $product)
        <li class="mb-10">
            <h2 class="font-semibold text-xl"><a href="/products/{{ $product->slug }}" class="text-blue-600">{{ $product->name }}</a></h2>
            <p class="mb-2">in <a href="/categories/{{ $product->category->slug }}" class="text-blue-500">{{ $product->category->name }}</a></p>
            <p>{{ $product->price }}</p>
            <p class="italic">"{{ $product->description }}"</p>
        </li>
        @endforeach
    </ul>
@endsection