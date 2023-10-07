<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = BookResource::collection(Book::all());
        $genres = Genre::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $user = auth()->user();

        return view('dashboard.books', ['books' => $books, 'genres' => $genres, 'authors' => $authors, 'publishers' => $publishers, 'user' => $user]);
    }

    public function create(Request $request)
    {
        $data = [
            'title' => strtoupper($request['title']),
            'image' => $request['image'],
            'description' => $request['description'],
            'ISBN' => $request['ISBN'],
            'pages' => $request['pages'],
            'rating' => $request['rating'],
            'quantity' => $request['quantity'],
            'published_date' => $request['published_date'],
            'author_id' => $request['author_id'],
            'publisher_id' => $request['publisher_id'],
            'genre_id' => $request['genre_id'],
        ];

        $rules = [
            'title' => 'required|unique:books|string',
            'image' => 'sometimes|string',
            'description' => 'required|string',
            'ISBN' => 'required|min:10|max:13',
            'pages' => 'required|integer',
            'rating' => 'required|numeric|max:5|min:0',
            'quantity' => 'required|integer',
            'published_date' => 'required|date',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'genre_id' => 'required|integer',
        ];


        $validator = Validator::make($data, $rules);

        // if validation fails return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Book::create($data);


        return redirect(route('books'))->withSuccess("Cadastro realizado com sucesso.");
    }
}