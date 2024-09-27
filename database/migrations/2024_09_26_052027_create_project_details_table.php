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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id('projectdetailsId');
            $table->unsignedBigInteger('proId');
            $table->unsignedBigInteger('userId');
            $table->tinyInteger('stage1_status')->default('0');
            $table->tinyInteger('stage2_status')->default('0');
            $table->tinyInteger('stage3_status')->default('0');
            $table->tinyInteger('stage4_status')->default('0');
            $table->tinyInteger('stage5_status')->default('0');
            $table->tinyInteger('stage6_status')->default('0');
            $table->timestamps();           
            $table->foreign('proId')->references('proId')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
