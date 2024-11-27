<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $fillable = [
        "brand_name",
        "brand_address",
        "bank_account_number",
        "bank_name",
        "managerID",
        "img",
        "phone",
    ];

    public function manager()
    {
        return $this->hasOne(Employee::class, 'id', "managerID");
    }

}