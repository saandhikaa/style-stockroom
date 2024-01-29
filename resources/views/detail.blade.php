@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-2">{{ $product->name }}</h1>
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl border-2 border-blue-500">
    @else
        <img src="https://source.unsplash.com/1000x1000/?{{ $product->category->name }}" alt="{{ $product->name }}" class="rounded-xl border-2 border-blue-500">
    @endif
    <p class="text-lg font-semibold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
    <p>{{ $product->sizes }}</p>
    <p>{{ $product->colors }}</p>
    <p class="italic mb-4">"{!! $product->description !!}"</p>
    <a href="/products" class="text-blue-600">back</a>
@endsection