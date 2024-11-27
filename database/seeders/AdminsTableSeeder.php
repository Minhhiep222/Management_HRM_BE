<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'id' => 1,
                'username' => 'admin1',
                'password' => Hash::make('123')
            ],
            [
                'id' => 2,
                'username' => 'admin2',
                'password' => Hash::make('123')
            ],
            [
                'id' => 3,
                'username' => 'admin3',
                'password' => Hash::make('123')
            ],
        ]);
    }
}
