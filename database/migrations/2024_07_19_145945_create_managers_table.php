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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeeID')->unique();
            $table->unsignedBigInteger('teamID')->unique()->nullable();
            $table->unsignedBigInteger('roomID')->unique()->nullable();
            $table->unsignedBigInteger('brandID')->unique()->nullable();
            $table->unsignedBigInteger('projectID')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managers');
    }
};