@extends('dashboard.layouts.app')

@section('main')
    <h1 class="text-2xl mt-4">Add new product</h1>

    <form action="/dashboard/products" method="post" class="w-full mt-5">
        @csrf
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="name">Name</label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 {{ $errors->has('name') ? 'border-red-500' : '' }}" id="name" name="name" type="text" placeholder="Product name" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="slug">Slug</label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 {{ $errors->has('slug') ? 'border-red-500' : '' }}" id="slug" name="slug" type="text" placeholder="Product slug" value="{{ old('slug') }}" required>
            @error('slug')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="category">Category</label>
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="category" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4">Sizes</label>
            <div class="sizes-container flex flex-wrap items-center">
                @foreach(old('sizes', ['']) as $size)
                    <div class="flex items-center mr-2 mb-2">
                        <input type="text" name="sizes[]" placeholder="One size" class="dynamic-width-input bg-gray-200 appearance-none border-2 border-gray-200 rounded-l-md h-10 w-24 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-center" value="{{ $size }}">
                        <button type="button" class="delete-size-button bg-gray-200 hover:bg-red-400 font-bold text-2xl text-gray-700 h-10 px-3 rounded-r-md border-l-2 border-l-gray-300">×</button>
                    </div>
                @endforeach
                <button type="button" class="add-size-button shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white text-2xl h-10 w-10 mb-2 rounded">+</button>
            </div>
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4">Colors</label>
            <div class="colors-container flex flex-wrap items-center">
                <div class="flex items-center mr-2 mb-2">
                    <input type="text" name="colors[]" placeholder="One color" class="dynamic-width-input bg-gray-200 appearance-none border-2 border-gray-200 rounded-l-md h-10 w-24 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-center">
                    <button type="button" class="delete-color-button bg-gray-200 hover:bg-red-400 font-bold text-2xl text-gray-700 h-10 px-3 rounded-r-md border-l-2 border-l-gray-300">×</button>
                </div>
                <button type="button" class="add-color-button shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white text-2xl h-10 w-10 mb-2 rounded">+</button>
            </div>
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="price">Price</label>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 {{ $errors->has('price') ? 'border-red-500' : '' }}" id="price" name="price" type="number" placeholder="Product price" value="{{ old('price') }}" required>
            @error('price')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="items-center mb-6">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="description">Description</label>
            <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-10 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 overflow-y-hidden" id="description" name="description" placeholder="Product description">{{ old('description') }}</textarea>
        </div>
        
        <div class="items-center">
            <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Add Product</button>
        </div>
    </form>
    
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        
        name.addEventListener('change', function() {
            fetch('/dashboard/products/generateSlug?data=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
        const textarea = document.querySelector("#description");
        textarea.addEventListener("input", e => {
            textarea.style.height = "auto";
            textarea.style.height = textarea.scrollHeight + "px";
        });
        
        document.addEventListener('DOMContentLoaded', function () {
            const sizesContainer = document.querySelector('.sizes-container');
            
            sizesContainer.addEventListener('input', function (event) {
                const target = event.target;
                if (target.tagName === 'INPUT' && target.classList.contains('dynamic-width-input')) {
                    target.style.width = `calc(${target.value.length}ch + 34px)`;
                }
            });
            
            sizesContainer.addEventListener('click', function (event) {
                const target = event.target;
                if (target.classList.contains('delete-size-button')) {
                    if (sizesContainer.querySelectorAll('input').length === 1) {
                        return;
                    }
                    target.closest('.flex').remove();
                } else if (target.classList.contains('add-size-button')) {
                    const inputs = sizesContainer.querySelectorAll('input');
                    for (let i = 0; i < inputs.length; i++) {
                        if (inputs[i].value === '') {
                            return;
                        }
                    }
                    const newSizeField = target.previousElementSibling.cloneNode(true);
                    
                    newSizeField.querySelector('input').value = '';
                    newSizeField.querySelector('input').style.width = '60px';
                    newSizeField.querySelector('input').placeholder = 'size';
                    
                    sizesContainer.insertBefore(newSizeField, target);
                    newSizeField.querySelector('input').focus();
                }
            });
            
            sizesContainer.addEventListener('blur', function (event) {
                const target = event.target;
                if (target.tagName === 'INPUT' && target.classList.contains('dynamic-width-input') && target.value === '') {
                    if (sizesContainer.querySelectorAll('input').length > 1) {
                        target.closest('.flex').remove();
                    }
                }
            }, true);
            
            const colorsContainer = document.querySelector('.colors-container');
            
            colorsContainer.addEventListener('input', function (event) {
                const target = event.target;
                if (target.tagName === 'INPUT' && target.classList.contains('dynamic-width-input')) {
                    target.style.width = `calc(${target.value.length}ch + 34px)`;
                }
            });
            
            colorsContainer.addEventListener('click', function (event) {
                const target = event.target;
                if (target.classList.contains('delete-color-button')) {
                    if (colorsContainer.querySelectorAll('input').length === 1) {
                        return;
                    }
                    target.closest('.flex').remove();
                } else if (target.classList.contains('add-color-button')) {
                    const inputs = colorsContainer.querySelectorAll('input');
                    for (let i = 0; i < inputs.length; i++) {
                        if (inputs[i].value === '') {
                            return;
                        }
                    }
                    const newColorField = target.previousElementSibling.cloneNode(true);
                    
                    newColorField.querySelector('input').value = '';
                    newColorField.querySelector('input').style.width = '60px';
                    newColorField.querySelector('input').placeholder = 'color';
                    
                    colorsContainer.insertBefore(newColorField, target);
                    newColorField.querySelector('input').focus();
                }
            });
            
            colorsContainer.addEventListener('blur', function (event) {
                const target = event.target;
                if (target.tagName === 'INPUT' && target.classList.contains('dynamic-width-input') && target.value === '') {
                    if (colorsContainer.querySelectorAll('input').length > 1) {
                        target.closest('.flex').remove();
                    }
                }
            }, true);
        });
    </script>
@endsection
