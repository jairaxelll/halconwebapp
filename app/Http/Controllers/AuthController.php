<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Logic for authentication can be added here

        return view('MainScreen', compact('email', 'password'));
    }
}