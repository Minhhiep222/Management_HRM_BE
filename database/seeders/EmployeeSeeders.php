<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employees')->insert([
            [
                'id' => 1,
                'account_id' => 1,
                'fullname' => "Nguyễn Hiệp",
                'nickname' => "Nguyễn",
                'img' => "user.jpg",
                'address' => "Bình Thành",
                'phone' => "0834983286",
                'phone_work' => "0834983286",
                'dob' => "2017/06/15",
                'email' => "minhhiep325@gmail.com",
                'email_work' => "minhhiep325@gmail.com",
                'start_date' => "2017/06/15",
                'finish_date' => "2017/06/15",
                'type' => "Part Time",
                'position' => "Employee",
                'state_work' => "Mới",
                'state_employee' => 'Hoạt động',
                'departmentID' => 1,
                'brandID' => 1,
                'marital_status' => "Kết hôn"
            ],
            [
                'id' => 2,
                'account_id' => 2,
                'fullname' => "Nguyễn Minh",
                'nickname' => "Nguyễn",
                'img' => "user.jpg",
                'address' => "Bình Thành",
                'phone' => "0834983286",
                'phone_work' => "0834983286",
                'dob' => "2017/06/15",
                'email' => "minhminh325@gmail.com",
                'email_work' => "minhminh325@gmail.com",
                'start_date' => "2017/06/15",
                'finish_date' => "2017/06/15",
                'type' => "Part Time",
                'position' => "Employee",
                'state_work' => "Mới",
                'state_employee' => 'Hoạt động',
                'departmentID' => 1,
                'brandID' => 1,
                'marital_status' => "Kết hôn"
            ]
        ]);
    }
}