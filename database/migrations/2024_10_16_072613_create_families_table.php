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
        Schema::create('families', function (Blueprint $table) {
            $table->id('familyId');
            $table->string('applicationId');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_grandfather')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('aadhaar_number')->nullable();
            $table->string('house_name')->nullable();
            $table->string('location')->nullable();
            $table->string('po')->nullable();
            $table->string('panchayat')->nullable();
            $table->string('district')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('mobile1')->nullable();
            $table->string('mobile2')->nullable();
            $table->integer('children_count')->nullable();
            $table->integer('male_count')->nullable();
            $table->integer('female_count')->nullable();
            $table->string('nri')->default('no'); // Default value can be adjusted as needed
            $table->string('occupation')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->string('other_income')->nullable();
            $table->text('health_status')->nullable();
            $table->string('disability')->default('no'); // Default value can be adjusted as needed
            $table->text('treatment_explanation')->nullable();
            $table->text('chronic_patients')->nullable();
            $table->string('residence_info')->default('own_house');
            $table->text('own_house_condition')->nullable();
            $table->string('own_place')->default('no');
            $table->string('own_place_size')->nullable();
            $table->string('sequel')->default('no');
            $table->text('welfare_assistance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
