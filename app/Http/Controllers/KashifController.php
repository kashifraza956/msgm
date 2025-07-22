<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class KashifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get Data from Employee model
        $employees = Employee::all(); // Select * from employees;
        // dd($employee);
        return view('employees.index', compact('employees'));
        // return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ]);
        return redirect()->route('employees.index');
        // return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        // $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $employee = Employee::findOrFail($id);
        if($employee){
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone_no = $request->phone_no;
            $employee->update();
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
        } else {
            return redirect()->route('employees.index')->with('error', 'Employee not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        if($employee){
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
        } else {
            return redirect()->route('employees.index')->with('error', 'Employee not found!');
        }
    }
}
