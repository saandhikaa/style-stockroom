@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-2xl mt-4">Add new product</h1>

    <form action="/dashboard/products" method="post" class="w-full mt-5">
        @csrf
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="name">Name</label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="name" name="name" type="text" placeholder="Product name">
        </div>
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="slug">Slug</label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="slug" name="slug" type="text" placeholder="Product slug">
        </div>
        <div class="items-center">
            <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Add Product</button>
        </div>
    </form>
@endsection
