@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-2xl mt-4">Product list</h1>
    
    @if (session()->has('success'))
        <div class="bg-green-200 text-green-800 border-green-300 border-2 px-6 py-4 rounded-md relative my-6">
            <span class="inline-block align-middle mr-8">
                {{ session()->get('success') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="this.parentElement.remove();">
                <span>×</span>
            </button>
        </div>
    @endif
    
    <a href="/dashboard/products/create" class="inline-block bg-blue-500 text-white mt-4 px-4 py-1 rounded-md">Add new product</a>
    
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Sizes</th>
                    <th class="px-4 py-2">Colors</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2">{{ $product->sizes }}</td>
                        <td class="border px-4 py-2">{{ $product->colors }}</td>
                        <td class="border px-4 py-2">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">
                            <ul>
                                <li><a href="/dashboard/products/{{ $product->slug }}" class="inline-block bg-blue-500 text-white text-xs px-2 py-1 rounded-full">view</a></li>
                                <li><a href="/dashboard/products/{{ $product->slug }}/edit" class="inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-full">edit</a></li>
                                <li>
                                    <form method="POST" action="/dashboard/products/{{ $product->slug }}" onsubmit="return confirm('Are you sure you want to delete {{ $product->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
