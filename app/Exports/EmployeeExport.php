<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
// use App\Exports\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    public function headings():array
    {
        return [
            'id', 'fullname', 'email', 'phone', 'birthday', 'role', 'assignment_date', 'state'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       //return Employee::all();
       return collect(Employee::getEmployees()); 
    }
}
