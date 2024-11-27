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
        Schema::create('work_dailies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employeeID');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('hour_work');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_dailies');
    }
};