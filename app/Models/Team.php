<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamDetail;
use App\Models\Manager;
use App\Models\Department;
use App\Models\Brand;

class Team extends Model
{
    use HasFactory;

    protected $table = "teams";

    protected $fillable = [
        "name",
        "img",
        "managerID",
        "roomID",
        "brandID",
        "description",
    ];

    //Khóa ngoại
    public function teamDetails() {
        return $this->hasMany(TeamDetail::class, "teamID" ,"id");
    }

    //liên kết với bản members
    public function members()
    {
        return $this->hasManyThrough(Employee::class, TeamDetail::class, 'teamID', 'id', 'id', 'memberID');
    }

    //liên kết với bản manager
    public function manager()
    {
        return $this->hasOne(Employee::class, 'id', "managerID");
    }

    //liển kết với bản phòng
    public function room()
    {
        return $this->hasOne(Department::class,'id','roomID');
    }

    //liển kết với bản phòng
    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brandID');
    }

}
