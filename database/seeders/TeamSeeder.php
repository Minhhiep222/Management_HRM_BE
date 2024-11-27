<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("teams")->insert([
            [
                "id" => 1,
                "name" => "Management",
                "img" => "user.jpg",
                "managerID" => 1,
                "roomID" => 1,
                "brandID" => 1,
                "description" => "Làm bằng cả tính mạng",
            ],
            [
                "id" => 2,
                "name" => "HR",
                "img" => "user.jpg",
                "managerID" => 2,
                "roomID" => 2,
                "brandID" => 2,
                "description" => "Bán mạng cho tư bản",
            ],
        ]);
    }
}
