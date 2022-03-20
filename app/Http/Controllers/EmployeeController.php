<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(8) ; 
        return view('employees.index', compact('employees'))->with(request()->input('page')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'          => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'birthday'          => 'required',
            'role'              => 'required',
            'assignment_date'   => 'required',
            'state'             => 'required'
        ]);
        $employees = Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // return view('Employees.edit', compact('employee')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
         return view('Employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'fullname'          => 'required',
            'email'             => 'required',
            'phone'             => 'required',
            'birthday'          => 'required',
            'role'              => 'required',
            'assignment_date'   => 'required',
            'state'             => 'required'
        ]);  
        $employee->update($request->all());
        return redirect()->route('employees.index')
        ->with('success', 'Product Updated Successfully') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('Success', 'Employee Deleted') ;
    }
}
