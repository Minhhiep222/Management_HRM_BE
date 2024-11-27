<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'fullname',
        'nickname',
        'img',
        'address',
        'phone',
        'phone_work',
        'dob',
        'sex',
        'email',
        'email_work',
        'start_date',
        'finish_date',
        'type',
        'position',
        'state_work',
        'phone_work',
        'email_work',
        'departmentID',
        'brandID',
        'marital_status',
        'state_employee'
    ];
}
