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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('proId');
            $table->string('projectID');
            $table->string('agencyProjectNo');
            $table->unsignedBigInteger('donorName');
            $table->unsignedBigInteger('projectManager');
            $table->float('availableBudget');
            $table->string('typeOfProject');
            $table->string('remarks');
            $table->timestamps();
            $table->foreign('donorName')->references('donor_id')->on('donors')->onDelete('cascade');
            $table->foreign('projectManager')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
