<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDaily extends Model
{
    use HasFactory;

    protected $table = "work_dailies";

    protected $fillable = [
        "employeeID",
        "start_date",
        "end_date",
        "hour_work",
    ];
}
