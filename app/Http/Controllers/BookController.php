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
    public function index(Request $request)
    {
        $genres = Genre::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $user = auth()->user();
        $amountPerPage = 8;


        // handle search
        $search = $request->input('search');

        if ($request->has('search')) {
            $books = Book::where('title', 'like', '%' . $search . '%')->paginate($amountPerPage);
        } else {
            $books = Book::paginate($amountPerPage);
        }

        return view('dashboard.books', ['books' => BookResource::collection($books), 'genres' => $genres, 'authors' => $authors, 'publishers' => $publishers, 'user' => $user]);
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
            'published_year' => $request['published_year'],
            'author_id' => $request['author_id'],
            'publisher_id' => $request['publisher_id'],
            'genres' => $request['genres'],
        ];



        $rules = [
            'title' => 'required|unique:books|string',
            'image' => 'sometimes|file',
            'description' => 'required|string',
            'ISBN' => 'required|min_digits:10|max_digits:13',
            'pages' => 'required|integer',
            'rating' => 'required|numeric|max:5|min:0',
            'quantity' => 'required|integer',
            'published_year' => 'required',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'genres' => 'required|array',
        ];


        $validator = Validator::make($data, $rules);

        // if validation fails return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = new Book($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $fileExtension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $fileExtension;

            $request->image->move(public_path('assets/images/books'), $imageName);

            $book->image = $imageName;




        } else {
            $book->image = "";
        }

        // save book
        $book->save();

        // attach genres
        foreach ($data['genres'] as $genre) {
            $genre = Genre::where("id", 'like', $genre)->first();
            $book = BookResource::make($book);

            $book->genres()->attach($genre->id);
        }


        return redirect(route('books'))->withSuccess("Cadastro realizado com sucesso.");
    }

    public function show(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view("dashboard.book_details", ['book' => $book, 'authors' => $authors, 'genres' => $genres, 'publishers' => $publishers]);
    }

    public function edit(Request $request, Book $book)
    {
        $values = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'ISBN' => 'required|min_digits:10|max_digits:13',
            'pages' => 'required|integer',
            'rating' => 'required|numeric|max:5|min:0',
            'quantity' => 'required|integer',
            'published_year' => 'required|integer|min_digits:4|max_digits:4',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'genres' => 'required|array',
        ]);

        $book->update($values);

        $genres = $values['genres'];


        $book->genres()->sync($genres);


        return redirect()->back()->withSuccess('Informações atualizadas com sucesso.');

    }
}