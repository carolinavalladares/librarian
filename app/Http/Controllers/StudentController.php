<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $filter = $request->input('filter');

        $students = Student::all();

        // handle search
        if ($request->has('search')) {
            $search = $request->input('search');

            $students = Student::where('name', 'like', '%' . $search . '%')->get();

            return view('dashboard.students', ['students' => StudentResource::collection($students), 'user' => $user]);
        }

        // handle filter
        if ($filter == "approved") {
            $students = Student::where('approved', true)->get();
        } else if ($filter == "denied") {
            $students = Student::where('approved', false)->get();
        } else if ($filter == "null") {
            $students = Student::where('approved', null)->get();
        } else {
            $students = Student::all();
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