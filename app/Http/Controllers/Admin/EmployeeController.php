<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class EmployeeController extends Controller
{

    /**
     * Display a listing of employees
     */
    public function index()
    {
        $employees = User::role('Employee')->get();

        return Inertia::render('Admin/Employees/Index', [
            'employees' => $employees
        ]);
    }


    /**
     * Show create employee form
     */
    public function create()
    {
        return Inertia::render('Admin/Employees/Create');
    }


    /**
     * Store a new employee
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // assign employee role
        $employee->assignRole('Employee');

        return redirect()->route('employees.index');
    }


    /**
     * Display employee details
     */
    public function show(User $employee)
    {
        return Inertia::render('Admin/Employees/Show', [
            'employee' => $employee
        ]);
    }


    /**
     * Show edit employee form
     */
    public function edit(User $employee)
    {
        return Inertia::render('Admin/Employees/Edit', [
            'employee' => $employee
        ]);
    }


    /**
     * Update employee
     */
    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->id,
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('employees.index');
    }


    /**
     * Delete employee
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}