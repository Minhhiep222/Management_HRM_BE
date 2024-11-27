<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Contract extends Model
{
    use HasFactory;
    protected $table = "contracts";
    protected $fillable = [
        "employee_id",
        "start_date",
        "end_date",
        "approval_date",
        "contract_type",
        "contract_status",
        "contract_num",
        "description",
    ];

    public function employee() {
        return $this->hasOne(Employee::class, "id" ,"employee_id");
    }
}
