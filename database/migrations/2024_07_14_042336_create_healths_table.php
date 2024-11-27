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
        Schema::create('healths', function (Blueprint $table) {
            $table->id("healths_id"); // Auto-incrementing primary key 'id'
            $table->unsignedBigInteger('employee_id');
            $table->string('blood_type', 10)->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->text('vaccination_records')->nullable();
            $table->text('chronic_conditions')->nullable();
            $table->date('last_checkup_date')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};