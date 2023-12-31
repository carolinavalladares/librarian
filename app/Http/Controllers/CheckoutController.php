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
        $bookAmount = 15;

        // get all approved users 
        $students = Student::where('approved', 'like', true)->get();

        // get all books
        $books = Book::paginate($bookAmount);

        // handle search
        $search = $request->input('search');

        if ($request->has('search')) {
            $books = Book::where('title', 'like', '%' . $search . '%')->paginate($bookAmount);
        } else {
            $books = Book::paginate($bookAmount);
        }


        return view('dashboard.checkout', ['user' => $user, 'students' => StudentResource::collection($students), 'books' => BookResource::collection($books)]);
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
                // if one of the selected books is already with the student, return error
                return redirect()->back()->withErrors(['book_already_borrowed' => 'Um ou mais dos livros selecionados já está emprestado para este estudante.']);

            } else {
                $student->borrowed_books()->attach($book->id);
            }
        }



        return redirect()->back()->withSuccess('Retirada realizada com sucesso');
    }



    public function return (Request $request)
    {
        $user = auth()->user();

        $students = Student::all();

        // only select students that have books 
        $students = $students->filter(function ($item) {
            $item = StudentResource::make($item);

            return $item->borrowed_books()->count() > 0;
        })->values();


        if ($request->has('student')) {
            $studentId = $request->input('student');
            $student = Student::where('id', $studentId)->first();
            $books = $student->borrowed_books;

            return view('dashboard.return', ['user' => $user, 'students' => $students, 'selectedStudent' => $student, 'books' => $books]);

        }


        return view('dashboard.return', ['user' => $user, 'students' => $students]);
    }

    public function handle_return(Request $request, Student $student)
    {
        $values = $request->validate([
            'books' => 'required|array'
        ]);

        $student = StudentResource::make($student);

        $books = collect($values['books']);

        foreach ($books as $book) {
            $student->borrowed_books()->detach($book);
        }


        return redirect(route('return'))->withSuccess('Devolução realizada com sucesso.');
    }
}