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
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id('leave_balanceId');
            $table->unsignedBigInteger('employeeId');
            $table->unsignedBigInteger('leavetypeId');
            $table->integer('balance');
            $table->timestamps();
            $table->foreign('employeeId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leavetypeId')->references('leavetypeId')->on('leave_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_balances');
    }
};
