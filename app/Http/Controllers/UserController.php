<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        $librarians = User::all();


        // handle search
        $search = $request->input('search');

        if ($request->has('search')) {
            $librarians = User::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $librarians = User::all();
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