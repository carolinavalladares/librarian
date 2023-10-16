<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $amount = 15;
        $user = auth()->user();
        $librarians = User::paginate($amount);


        // handle search
        $search = $request->input('search');

        if ($request->has('search')) {
            $librarians = User::where('name', 'like', '%' . $search . '%')->paginate($amount);
        } else {
            $librarians = User::paginate($amount);
        }


        return view('dashboard.librarians', ['user' => $user, 'librarians' => $librarians]);
    }

    // dashboard
    public function dashboard()
    {
        $user = auth()->user();


        return view('dashboard.index', ['user' => $user]);
    }


}