<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("team_details")->insert([
            [
                "id" => 1,
                "memberID" => 1,
                "teamID" => 1,
            ],
            [
                "id" => 2,
                "memberID" => 2,
                "teamID" => 1,
            ],
            [
                "id" => 3,
                "memberID" => 3,
                "teamID" => 1,
            ],

            [
                "id" => 4,
                "memberID" => 4,
                "teamID" => 2,
            ],
            [
                "id" => 5,
                "memberID" => 5,
                "teamID" => 2,
            ],
            [
                "id" => 6,
                "memberID" => 6,
                "teamID" => 2,
            ]
        ]);
    }
}