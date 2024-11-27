<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'id' => 1,
                'email' => 'minhhiep325@gmail.com',
                'name' => 'user1',
                'role' => 'CEO',
                'password' => Hash::make('123')
            ],
            // [
            //     'id' => 2,
            //     'email' => 'user2@gmail.com',
            //     'username' => 'user2',
            //     'password' => Hash::make('123')
            // ],
            // [
            //     'id' => 3,
            //     'email' => 'user3@gmail.com',
            //     'username' => 'user3',
            //     'password' => Hash::make('123')
            // ],
        ]);
    }
}
