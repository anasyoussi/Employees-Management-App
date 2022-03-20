<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
     
    public function exportIntoExcel()
    {  
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
        return redirect()->route('employees.index');    
    }  

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

    public function download()
    {
        return view('Employees.download'); 
    }

    // public static function getExcel()
    // {
    //     return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    //         //    ->redirect()->route('employees.index');
    // }

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
