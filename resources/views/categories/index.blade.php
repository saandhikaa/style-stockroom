@extends('layouts.app')

@section('main')
    <h1 class="text-2xl font-semibold mb-8 text-center">All Category</h1>
    <ul>
        @foreach ($categories as $category)
        <li class="mb-2"><a href="/products?category={{ $category->slug }}" class="text-blue-500">{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection