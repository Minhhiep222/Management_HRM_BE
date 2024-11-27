<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        "name",
        "description",
        "customerID",
        "managerID",
        "expense",
        "start_date",
        "finish_date",
        "time",
        "state",
    ];

    //Khóa ngoại
    public function projectDetails() {
        return $this->hasMany(Detail_project::class, "project_id" ,"id");
    }

    //liên kết với bản members
    public function members()
    {
        return $this->hasManyThrough(Employee::class, Detail_project::class, 'project_id', 'id', 'id', 'employee_id');
    }

    //liên kết với bản manager
    public function manager()
    {
        return $this->hasOne(Employee::class, 'id', "managerID");
    }

    //liên kết với bản manager
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', "customerID");
    }



}
