@extends('layouts.app')

@section('main')
    @if (session()->has('regist'))
        <div class="bg-blue-500 text-white px-6 py-4 border-0 rounded relative mb-6">
            <span class="inline-block align-middle mr-8">
                {{ session()->get('regist') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="this.parentElement.remove();">
                <span>×</span>
            </button>
        </div>
    @endif
    
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
            <div class="p-8">
                <h1 class="text-3xl font-bold mb-4">Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border {{ $errors->has('email') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" required>
                        @error('email')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border {{ $errors->has('password') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password" required>
                        @error('password')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Sign In
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/register">
                            Don't have an account? Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
