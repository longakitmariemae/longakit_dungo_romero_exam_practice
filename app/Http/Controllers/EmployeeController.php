<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {   
        $employees = Employee::all();
        return view ('employee.index', compact('employees'));
    }

    public function create()
    {
        return view ('employee.create');
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

    Employee::create($request->all());
    return redirect()->route('employee.index');
    }

    public function edit( int $id)
    {
        $employee = Employee::findOrFail($id);
        return view ('employee.edit', compact('employee'));
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|',
                'lname' => 'required|max:255|',
                'midname' => 'required|max:255|',
                'age' => 'required|',
                'address' => 'required|max:255|',
                'zip' => 'required|',
                
            ]);
        
            Employee::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }
    }

    public function delete(int $id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect ()->back()->with('status','Employee Deleted');
    }
}
