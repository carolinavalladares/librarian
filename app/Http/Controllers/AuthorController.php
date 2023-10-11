<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::all();
        $user = auth()->user();

        // handle search
        if ($request->has('search')) {
            $search = $request->input('search');

            $authors = Author::where('name', 'like', '%' . $search . '%')->get();
        }

        return view('dashboard.authors', ['authors' => $authors, 'user' => $user]);
    }

    public function create(Request $request)
    {

        $data = ['name' => strtoupper($request->name)];

        $rules = [
            'name' => 'required|unique:authors'
        ];

        $validator = Validator::make($data, $rules);

        // if validation fails return and display errors
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $data['name'];

        Author::create(['name' => $name]);

        return redirect()->back()->withSuccess('Registro realizado com sucesso.');
    }
}