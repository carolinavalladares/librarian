<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::all();
        $user = auth()->user();

        // handle search
        if ($request->has('search')) {
            $search = $request->input('search');

            $publishers = Publisher::where('name', 'like', '%' . $search . '%')->get();
        }

        return view('dashboard.publishers', ['publishers' => $publishers, 'user' => $user]);
    }

    public function create(Request $request)
    {

        $data = ['name' => strtoupper($request->name)];

        $rules = [
            'name' => 'required|unique:publishers'
        ];

        $validator = Validator::make($data, $rules);

        // if validation fails return and display errors
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $data['name'];

        Publisher::create(['name' => $name]);

        return redirect()->back()->withSuccess('Registro realizado com sucesso.');
    }
}