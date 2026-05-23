<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Employee;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|max:255|',
            'lname' => 'required|max:255|',
            'midname' => 'required|max:255|',
            'age' => 'required|',
            'address' => 'required|max:255|',
            'zip' => 'required|',
            
        ]);

        Student::create($request->all());
        return redirect()->route('student.index');
    }
    
    public function edit(int $id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'fname' => 'required|max:255|',
            'lname' => 'required|max:255|',
            'midname' => 'required|max:255|',
            'age' => 'required|',
            'address' => 'required|max:255|',
            'zip' => 'required|',
            
        ]);

        Student::findOrFail($id)->update($request->all());
        return redirect()->back()->with('status', 'Student Updated Successfully!');
    }

    public function delete(int $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'Student Deleted Successfully!');
    }
    

}
