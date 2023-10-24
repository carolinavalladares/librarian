<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $amount = 15;
        $user = auth()->user();
        $filter = $request->input('filter');
        $students = Student::paginate($amount);

        // handle search
        if ($request->has('search')) {
            $search = $request->input('search');

            $students = Student::where('name', 'like', '%' . $search . '%')->paginate($amount);

            return view('dashboard.students', ['students' => StudentResource::collection($students), 'user' => $user]);
        }

        // handle filter
        if ($filter == "approved") {
            $students = Student::where('approved', true)->paginate($amount);
        } else if ($filter == "denied") {
            $students = Student::where('approved', false)->paginate($amount);
        } else if ($filter == "null") {
            $students = Student::where('approved', null)->paginate($amount);
        } else {
            $students = Student::paginate($amount);
        }

        return view('dashboard.students', ['students' => StudentResource::collection($students), 'user' => $user]);
    }

    public function register()
    {
        return view('student_registration');
    }

    public function handle_register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students|email',
            'registration' => 'required|unique:students|min:12|max:12'
        ]);

        Student::create($data);

        return redirect()->back()->withSuccess('Registro realizado com sucesso. Aguarde a aprovação.');
    }


    public function approve(Student $student)
    {
        $student = StudentResource::make($student);

        if ($student->borrowed_books->count() > 0) {
            return redirect()->back()->withErrors(["has_borrowed_books" => 'O status só pode ser mudado se o estudante não estiver com livros emprestados']);
        }

        $student->update(['approved' => true]);

        return redirect()->back()->withSuccess("Registro atualizado com sucesso.");
    }
    public function deny(Student $student)
    {

        $student = StudentResource::make($student);

        if ($student->borrowed_books->count() > 0) {
            return redirect()->back()->withErrors(["has_borrowed_books" => 'O status só pode ser mudado se o estudante não estiver com livros emprestados']);
        }

        $student->update(['approved' => false]);

        return redirect()->back()->withSuccess("Registro atualizado com sucesso.");
    }

    public function show(Student $student)
    {
        $student = StudentResource::make($student);
        return view("dashboard.student_page", ["student" => $student]);
    }

    public function handle_student_edit(Request $request, Student $student)
    {

        $values = $request->validate([
            "name" => "required",
            'email' => 'required|email',
            'registration' => 'required|numeric'
        ]);


        $student->update($values);


        return redirect()->back()->withSuccess('Informações atualizadas com sucesso.');

    }
}