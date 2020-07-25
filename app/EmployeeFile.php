<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFile extends Model
{
    protected $table = "employee_files";
    
    protected $fillable =[
        "employee_id","file_link"
    ];
}
