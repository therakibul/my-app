<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Rules\UpperCase;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::paginate(2);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required'],
            'email' => 'required|email',
            'role' => 'required',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return to_route('employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return to_route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::find($id);
        Employee::destroy($id);
        return to_route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
