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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id('leaveId');
            $table->unsignedBigInteger('user_id');  // Foreign key to the users table
            $table->date('leave_duration_start');  // Start date of the leave
            $table->date('leave_duration_end');  // End date of the leave
            $table->unsignedBigInteger('leave_type_id');  // Foreign key to leave_types table
            $table->text('remarks')->nullable();  // Optional remarks field
            $table->timestamps();  // created_at and updated_at timestamps
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leave_type_id')->references('leavetypeId')->on('leave_types')->onDelete('cascade');
       
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_applications');
    }
};
