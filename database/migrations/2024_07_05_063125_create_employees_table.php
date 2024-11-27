<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('departmentID')->nullable();
            $table->unsignedBigInteger('brandID')->nullable();
            $table->string("fullname", 1000)->nullable();
            $table->string("nickname", 1000)->nullable();
            $table->longtext("img")->nullable();
            $table->string("address", 1000)->nullable();
            $table->string("phone", 1000)->nullable();
            $table->string("phone_work", 1000)->nullable();
            $table->enum("sex", ['Nam', 'Nữ', 'Khác'])->nullable();
            $table->enum("marital_status", ['Chưa kết hôn', 'Kết hôn', 'Khác'])->nullable();
            $table->date("dob")->nullable();
            $table->string("email")->unique();
            $table->string("email_work")->nullable();
            $table->date("start_date")->nullable();
            $table->date("finish_date")->nullable();
            $table->enum('type', ["Part Time", "Over Time", "Hot Desking"])->nullable();
            $table->enum('position', ['CEO', 'Employee', 'Manager'])->nullable();
            $table->enum('state_work', ['Mới', 'Cũ'])->nullable();
            $table->enum('state_employee', ['Hoạt động', 'Dừng'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};