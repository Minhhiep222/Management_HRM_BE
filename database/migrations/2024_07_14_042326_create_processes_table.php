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
        Schema::create('processes', function (Blueprint $table) {
            $table->id("processes_id"); // Auto-incrementing primary key 'id'
            $table->unsignedBigInteger('employee_id');
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('end_time')->nullable();
            $table->text('task_description');
            $table->enum('task_status', ['đã hoàn thành', 'đang thực hiện', 'chưa bắt đầu'])->default('chưa bắt đầu');
            $table->time('task_duration')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
