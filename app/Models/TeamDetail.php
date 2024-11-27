<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Employee;

class TeamDetail extends Model
{
    use HasFactory;
    protected $table = "team_details";
    protected $fillable = [
        "memberID",
        "teamID",
    ];

    public function member() {
        return $this->belongsTo(Employee::class, 'memberID', 'id');
    }

    public function teams() {
        return $this->hasMany(Team::class, "id" ,"teamID");
    }
}