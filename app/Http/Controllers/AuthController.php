<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function handle_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt login with provided credentials
        if (auth()->attempt($credentials)) {
            return redirect(route('dashboard'));
        }

    }


    public function logout()
    {
        auth()->guard('web')->logout();

        return redirect(route('home'));
    }
}