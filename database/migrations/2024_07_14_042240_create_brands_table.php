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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('brand_address');
            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('phone');
            $table->string('img');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('managerID');
            $table->enum('state', ['đang hoạt động', 'dừng hoạt động'])->default('đang hoạt động');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};