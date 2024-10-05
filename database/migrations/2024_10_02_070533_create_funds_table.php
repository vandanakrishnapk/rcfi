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
        Schema::create('funds', function (Blueprint $table) {
            $table->id('fundId');
            $table->UnsignedBigInteger('input');
            $table->unsignedBigInteger('proId');
            $table->Integer('amount');
            $table->string('unit');
            $table->Integer('current');
            $table->Integer('balance');
            $table->timestamps();
            $table->foreign('proId')->references('proId')->on('project_details')->onDelete('cascade');
            $table->foreign('input')->references('inputId')->on('inputs')->onDelete('cascade');
   
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
