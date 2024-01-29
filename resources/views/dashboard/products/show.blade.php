@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-3xl font-semibold mb-2">{{ $product->name }}</h1>
    <ul class="flex space-x-2 mb-4">
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
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl border-2 border-blue-500">
    @else
        <img src="https://source.unsplash.com/1000x1000/?{{ $product->category->name }}" alt="{{ $product->name }}" class="rounded-xl border-2 border-blue-500">
    @endif
    <p class="text-lg font-semibold mt-4">{{ $product->price }}</p>
    <p>{{ $product->sizes }}</p>
    <p>{{ $product->colors }}</p>
    <p class="italic my-4">"{!! $product->description !!}"</p>
@endsection