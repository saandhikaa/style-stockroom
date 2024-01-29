@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-2">{{ $product->name }}</h1>
    <ul class="flex space-x-2">
        <li><a href="/dashboard/products" class="inline-block bg-blue-500 text-white text-xs px-2 py-1 rounded-md">Back to All Products</a></li>
        <li><a href="/dashboard/products/{{ $product->slug }}/edit" class="inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-md">Edit</a></li>
        <li>
            <form method="POST" action="/dashboard/products/{{ $product->slug }}" onsubmit="return confirm('Are you sure you want to delete {{ $product->name }}?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-md">
                    Delete
                </button>
            </form>
        </li>
    </ul>
    
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    @else
        <img src="https://source.unsplash.com/1000x1000/?{{ $product->category->name }}" alt="{{ $product->name }}">
    @endif
    <p class="text-lg font-semibold">{{ $product->price }}</p>
    <p>{{ $product->sizes }}</p>
    <p>{{ $product->colors }}</p>
    <p class="italic mb-4">"{!! $product->description !!}"</p>
@endsection