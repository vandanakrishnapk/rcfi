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
        Schema::create('bills', function (Blueprint $table) {
            $table->id('billId');
            $table->unsignedBigInteger('fundId'); // Foreign key for project
            $table->unsignedBigInteger('proId'); 
            $table->tinyInteger('eng_status')->default(0); // 0 = pending, 1 = approved, 2 = rejected
            $table->tinyInteger('hod_status')->default(0);
            $table->tinyInteger('coo_status')->default(0);
            $table->tinyInteger('paymentstatus')->default(0); // 0 = pending, 1 = paid, 2 = failed
            $table->timestamps(); // Created at and updated at timestamps  
            $table->foreign('proId')->references('proId')->on('project_details')->onDelete('cascade');
            $table->foreign('fundId')->references('fundId')->on('funds')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
