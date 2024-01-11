@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-2xl mt-4">Product list</h1>
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
                                <li><a href="" class="inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-full">edit</a></li>
                                <li><a href="" class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full">delete</a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
