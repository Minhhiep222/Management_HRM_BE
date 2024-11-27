<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_project extends Model
{
    use HasFactory;

    protected $table = "detail_projects";

    protected $fillable = [
        "project_id",
        "employee_id"
    ];

}