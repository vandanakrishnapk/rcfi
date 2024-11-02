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
            $table->UnsignedBigInteger('proId');          
            $table->string('completion_certificate');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('photo4');
            $table->string('photo5');
            $table->string('measurement_book');
            $table->decimal('total_amount', 10, 2); // Change precision as needed
            $table->decimal('total_amount_paid_by_donor', 10, 2); // Change precision as needed
            $table->decimal('community_contribution', 10, 2); // Change precision as needed
            $table->text('any_other')->nullable();
            $table->point('geo_location')->nullable(); // Geo location as a point
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
