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
        Schema::create('differently_abled', function (Blueprint $table) {
            $table->id('diffId');
            $table->string('applicant_name');
            $table->string('father_name');
            $table->string('fathers_father');
            $table->string('mother_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('aadhaar_number');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->string('guardian')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('total_members');
            $table->integer('male_members');
            $table->integer('female_members');
            $table->integer('people_with_disabilities')->nullable();
            $table->decimal('monthly_income', 10, 2);
            $table->decimal('monthly_cost', 10, 2);
            $table->string('source_of_income')->nullable();
            $table->string('studying_institution')->nullable();
            $table->string('reason_for_not_studying')->nullable();
            $table->string('health_status')->nullable();
            $table->string('disability')->nullable();
            $table->integer('disability_percentage')->nullable();
            $table->date('disability_date')->nullable();
            $table->enum('disability_level', ['simple', 'hard', 'very_hard'])->nullable();
            $table->string('anyone_else_help')->nullable();
            $table->text('description')->nullable();
            $table->string('accommodation_details')->nullable();
            $table->string('house_name')->nullable();
            $table->string('place')->nullable();
            $table->string('panchayat')->nullable();
            $table->string('good_flowers')->nullable();
            $table->string('pincode');
            $table->string('mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('differently_ableds');
    }
};
