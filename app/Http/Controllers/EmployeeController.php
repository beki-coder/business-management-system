<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::with('department')->latest()->paginate(10);

        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:employees',
            'phone'=>'nullable',
            'department_id'=>'required',
            'position'=>'required',
            'salary'=>'nullable|numeric',
            'join_date'=>'required|date'
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                ->with('success','Employee created successfully');
    }


    public function show(Employee $employee)
    {
        $employee->load('department');
        
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('employees.edit',
        compact('employee','departments'));
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'department_id'=>'required',
            'position'=>'required'
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
        ->with('success','Employee updated');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
        ->with('success','Employee deleted');
    }
}