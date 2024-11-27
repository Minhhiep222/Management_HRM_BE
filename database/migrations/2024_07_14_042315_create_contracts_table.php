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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('approval_date');
            $table->enum('contract_num', ['HĐLĐ-1', 'HĐLĐ-2']);
            $table->enum('contract_type', ['Hợp đồng lao động', 'Hợp đồng thử việc', 'Hợp đồng dự án']);
            $table->enum('contract_status', ['đang hiệu lực', 'đã kết thúc', 'hợp đồng bị hủy']);
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};