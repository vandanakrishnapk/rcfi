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
        Schema::create('general_projects', function (Blueprint $table) {
            $table->id('generalId');
            $table->string('name');
            $table->integer('age');
            $table->string('address');
            $table->string('ward')->nullable();
            $table->string('po')->nullable();
            $table->string('village')->nullable();
            $table->string('panchayat')->nullable();
            $table->string('block')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('sex');
            $table->string('status');
            $table->string('education')->nullable();
            $table->integer('male_members')->nullable();
            $table->integer('female_members')->nullable();
            $table->integer('total_members')->nullable();
            $table->integer('earning_members')->nullable();
            $table->decimal('average_income', 10, 2)->nullable();
            $table->string('applying_for')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->string('recommended_by')->nullable();
            $table->string('phone_number')->nullable();   
            $table->unsignedBigInteger('type_of_application');
            $table->foreign('type_of_application')->references('typeId')->on('apptypes')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_projects');
    }
};
