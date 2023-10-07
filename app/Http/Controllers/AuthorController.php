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

    public function registerAuthor(Request $request)
    {
        $values = $request->validate([
            'name' => 'required'
        ]);

        Author::create($values);

        return redirect()->back()->withSuccess('Registro realizado com sucesso.');
    }
}