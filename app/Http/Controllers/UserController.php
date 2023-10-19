<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Student;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

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
        $librarians = User::all()->count();
        $books = Book::all();
        $authors = Author::all()->count();
        $publishers = Publisher::all()->count();
        $genres = Genre::all()->count();
        $students = Student::all();

        $bookAmount = 0;

        foreach ($books as $book) {
            $bookAmount += $book->quantity;
        }


        return view('dashboard.index', ['user' => $user, 'students' => $students, 'authors' => $authors, 'publishers' => $publishers, 'genres' => $genres, 'librarians' => $librarians, 'books' => $bookAmount]);
    }




}