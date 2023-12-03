@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-2">{{ $product->name }}</h1>
    <p class="text-lg font-semibold">{{ $product->price }}</p>
    <p>{{ $product->sizes }}</p>
    <p>{{ $product->colors }}</p>
    <p class="italic mb-4">"{!! $product->description !!}"</p>
    <a href="/products" class="text-blue-600">back</a>
@endsection