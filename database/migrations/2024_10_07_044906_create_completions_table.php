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
        Schema::create('completions', function (Blueprint $table) {
            $table->id('completionId');
            $table->unsignedBigInteger('proId');
            $table->string('feild1');
            $table->string('field2');
            $table->string('field3');
            $table->string('file1');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->foreign('proId')->references('proId')->on('project_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completions');
    }
};
