<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Resources\StudentResource;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = auth()->user();

        // get all approved users 
        $students = Student::where('approved', 'like', true)->get();

        // get all books
        $books = Book::all();

        // handle search
        $search = $request->input('search');

        if ($request->has('search')) {
            $books = Book::where('title', 'like', '%' . $search . '%')->get();
        } else {
            $books = BookResource::collection(Book::all());
        }


        return view('dashboard.checkout', ['user' => $user, 'students' => StudentResource::collection($students), 'books' => $books]);
    }

    public function handle_checkout(Request $request)
    {
        $values = $request->validate([
            'student_id' => 'required',
            'books' => 'required|array'
        ]);

        $student = StudentResource::make(Student::where('id', 'like', $values['student_id'])->first());
        $books = collect($values['books']);


        // if no such user exists return error
        if (!$student) {
            return redirect()->back()->withErrors(['no_user' => 'Usuário não encontrado.'])->withInput();
        }

        $borrowedBooks = collect($student->borrowed_books);


        // if user is currently with 3 books return book limit error
        if ($borrowedBooks->count() >= 3) {
            return redirect()->back()->withErrors(['book_limit_reached' => 'Usuário já atingiu o limite de livros permitido.'])->withInput();
        }

        // if the amount of books the user wants to borrow added to the amount of books that the user is currently borrowing are over 3 return insuficient limit error
        if ($borrowedBooks->count() + $books->count() > 3) {
            return redirect()->back()->withErrors(['book_limit_not_enough' => 'Usuário não tem limite suficiente para pegar todos os livros.'])->withInput();
        }

        foreach ($values['books'] as $book) {

            $book = Book::where('id', 'like', $book)->first();
            $book = BookResource::make($book);

            if ($student->borrowed_books->contains($book->id)) {
                continue;
            }


            $student->borrowed_books()->attach($book->id);
        }



        return redirect()->back()->withSuccess('Retirada realizada com sucesso');
    }



    public function return ()
    {
        $user = auth()->user();
        return view('dashboard.return', ['user' => $user]);
    }
}