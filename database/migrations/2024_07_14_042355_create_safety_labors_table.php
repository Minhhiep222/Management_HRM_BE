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
        Schema::create('safety_labors', function (Blueprint $table) {
            $table->id('safety_labor_id'); // Auto-incrementing primary key 'safety_labor_id'
            $table->unsignedBigInteger('brand_id');
            $table->string('safety_equipment');
            $table->text('training_received')->nullable();
            $table->date('safety_inspection_date')->nullable();
            $table->text('accident_history')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_labors');
    }
};
