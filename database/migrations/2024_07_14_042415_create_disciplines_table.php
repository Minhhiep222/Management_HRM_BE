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
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id('subsidize_welfare_id'); // Auto-incrementing primary key 'subsidize_welfare_id'
            $table->unsignedBigInteger('branch_id');
            $table->integer('vacation_days')->nullable();
            $table->decimal('maternity_allowance', 10, 2)->nullable();
            $table->decimal('sickness_allowance', 10, 2)->nullable();
            $table->decimal('social_insurance', 10, 2)->nullable();
            $table->decimal('health_insurance', 10, 2)->nullable();
            $table->decimal('pension', 10, 2)->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplines');
    }
};
