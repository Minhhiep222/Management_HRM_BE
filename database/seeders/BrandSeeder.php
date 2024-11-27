<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("brands")->insert([
            [
                "id" => 1,
                "managerID" => 1,
                "brand_name" => "Toàn Thắng",
                "phone" => "0834983286",
                "brand_address" => "29/48 Lã Xuân Oai",
                "bank_account_number" => "251220048668",
                "bank_name" => "TechComBank",
                "img" => "user.jpg",
                "state" => "đang hoạt động"

            ],
            [
                "id" => 2,
                "managerID" => 2,
                "brand_name" => "Toàn Thắng 2",
                "phone" => "0834983286",
                "brand_address" => "29/48 Gò Vấp",
                "bank_account_number" => "251220048668",
                "bank_name" => "TechComBank",
                "img" => "user.jpg",
                "state" => "đang hoạt động"
            ],

        ]);
    }
}