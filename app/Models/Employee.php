<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'email', 'phone', 'birthday', 'role', 'assignment_date', 'state'];

    public static function getEmployees()
    {
        $records = DB::table('employees')->select('id','fullname', 'email', 'phone', 'birthday', 'role', 'assignment_date', 'state')
                   ->get()->toArray();
        return $records; 
    }
}
