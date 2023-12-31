<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index', [
            'title' => 'Registration'
        ]);
    }
    
    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        
        // $request->session()->flash('regist', 'Registration success! Please login');
        return redirect('/login')->with('regist', 'Registration success! Please login');
    }
}
