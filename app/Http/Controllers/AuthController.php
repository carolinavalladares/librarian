<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        } else {
            return redirect()->back()->with('fail_message', 'Falha ao logar... Tente novamente.');
        }

    }

    public function handle_register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);


        User::create($data);

        return redirect()->back()->withSuccess('Cadastro realizado com sucesso.');

    }


    public function logout()
    {
        auth()->guard('web')->logout();

        return redirect(route('home'));
    }
}