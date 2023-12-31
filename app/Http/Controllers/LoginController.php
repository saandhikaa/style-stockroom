<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }
    
    public function authenticate (Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        
        dd($request->all());
    }
}
