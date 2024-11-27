<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'managerID' => 1,
                'brandID' =>  1,
                'department_name' => 'Nhân sự',
                "description" => "code tới chết",
                "img" => "user.jpg",
            ],
            [
                'id' => 2,
                'managerID' => 2,
                'brandID' =>  1,
                'department_name' => 'Kế Toán',
                "description" => "code tới chết",
                "img" => "user.jpg",
            ],

        ]);
    }
}
