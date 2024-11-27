<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("departments")->insert([
            [
                "img"=> "user.jpg",
                "department_name"=> "Nhân Sự",
                "brandID" => 1,
                "description" => "code tới chết",
            ],
            [
                "img"=> "user.jpg",
                "brandID" => 1,
                "department_name"=> "Chăm sóc khách hàng",
                "description" => "code tới chết",
            ]
        ]);
    }
}
