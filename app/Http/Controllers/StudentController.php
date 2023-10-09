<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $user = auth()->user();

        return view('dashboard.students', ['students' => $students, 'user' => $user]);
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
            'registration' => 'required|unique:students'
        ]);

        Student::create($data);

        return redirect()->back()->withSuccess('Registro realizado com sucesso. Aguarde a aprovação.');
    }


    public function approve(Student $student)
    {

        $student->update(['approved' => true]);

        return redirect()->back()->withSuccess("Registro aprovado.");
    }
    public function deny(Student $student)
    {

        $student->update(['approved' => false]);

        return redirect()->back()->withSuccess("Registro Negado.");
    }
}