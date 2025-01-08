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
        Schema::create('leave_allocations', function (Blueprint $table) {
            $table->id('leave_allocationId');
            $table->unsignedBigInteger('employeeId');
            $table->string('employee_name');
            $table->string('leave_type');
            $table->integer('leave_days');
            $table->unsignedBigInteger('allocated_by'); // HR user ID
            $table->timestamps();

            // Foreign key constraint (assuming employees table exists)
            $table->foreign('employeeId')->references('id')->on('users')->onDelete('cascade');
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_allocations');
    }
};
