<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $genres = Genre::all();

        // handle search
        if ($request->has('search')) {
            $search = $request->input('search');

            $genres = Genre::where('name', 'like', '%' . $search . '%')->get();
        }

        return view('dashboard.genres', ['genres' => $genres, 'user' => $user]);

    }

    public function create(Request $request)
    {

        $data = ['name' => strtoupper($request->name)];

        $rules = [
            'name' => 'required|unique:genres'
        ];

        $validator = Validator::make($data, $rules);

        // if validation fails return and display errors
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $data['name'];

        Genre::create(['name' => $name]);

        return redirect()->back()->withSuccess('Registro realizado com sucesso.');
    }
}