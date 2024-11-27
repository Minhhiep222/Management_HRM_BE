<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Employee;

class Manager extends Model
{
    use HasFactory;
    protected $table = "managers";
    protected $fillable = [
        "employeeID", "teamID","brandID","projectID","roomID"
    ];

    public function manager() {
        return $this->belongsTo(Team::class, "id" ,"teamID");
    }
    public function members() {
        return $this->hasMany(Employee::class, "id" ,"employeeID");
    }
}