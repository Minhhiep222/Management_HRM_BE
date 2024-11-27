<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("customers")->insert([
            ["id" => 1,
            "name" => "Minh Hiệp",
            "phone" => "09734933",
            "address" => "Bình Thành",
            "name_company" => "Toàn Thắng",
            "MST" => "038443232",
            "cccd" => "080204004595",
            "email" => "minh@gmail.com",
            "bank" => "251204",
            "img" => "user.jpg",
            "description" => "1 tỷ",
            ],
            ["id" => 2,
            "name" => "Minh Hiệp",
            "phone" => "09734933",
            "address" => "Bình Thành",
            "name_company" => "Toàn Thắng",
            "MST" => "038443232",
            "cccd" => "080204004595",
            "email" => "minh@gmail.com",
            "bank" => "251204",
            "img" => "user.jpg",
            "description" => "1 tỷ",
            ],
        ]
    );

    }
}
