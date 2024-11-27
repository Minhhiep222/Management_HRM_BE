<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $fillable = [
        'department_name',
        'img',
        'description',
        'managerID',
        'brandID'
    ];

    public function room(){
        return $this->belongsTo(Team::class, "roomID" ,"id",);
    }

    public function manager(){
        return $this->hasOne(Employee::class, "id" ,"managerID",);
    }

    public function brand(){
        return $this->hasOne(Brand::class, "id" ,"brandID",);
    }

    public function employees(){
        return $this->hasMany(Employee::class, "departmentID" ,"department_id",);
    }
}