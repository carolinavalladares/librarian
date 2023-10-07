<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $user = auth()->user();

        return view('authors', ['authors' => $authors, 'user' => $user]);
    }
}