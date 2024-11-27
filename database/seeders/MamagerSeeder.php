<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MamagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("managers")->insert([
            [
                "id"=> 1,
                "teamID" => 1,
                "employeeID" => 1,
                "roomID" => null,
                "brandID" => null,
                "projectID" => null,

            ],
            [
                "id"=> 2,
                "teamID" => 2,
                "employeeID" => 2,
                "roomID" => null,
                "brandID" => null,
                "projectID" => null,

            ]
        ]);
    }
}
