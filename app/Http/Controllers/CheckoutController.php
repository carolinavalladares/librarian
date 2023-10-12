<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = auth()->user();
        return view('dashboard.checkout', ['user' => $user]);
    }

    public function handle_checkout(Request $request)
    {

    }



    public function return ()
    {
        $user = auth()->user();
        return view('dashboard.return', ['user' => $user]);
    }
}