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
        Schema::create('medicals', function (Blueprint $table) {
            $table->id('medicalId');
            $table->string('applicationId');
            $table->string('applicantName');
            $table->string('committeeName');
            $table->year('year');
            $table->string('registerNo');
            $table->string('village');
            $table->string('place');
            $table->string('panchayat');
            $table->string('post');
            $table->string('district');
            $table->string('state');
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->string('mahalName');
            $table->string('projectplace');
            $table->string('projectVillage');
            $table->string('stateProject');
            $table->integer('familiesBenefited');
            $table->enum('buildingPresent', ['yes', 'no']);
            $table->string('requirements');
            $table->integer('totalSqrFt');
            $table->string('location');
            $table->decimal('expectedAmount', 10, 2);
            $table->enum('pharmacy', ['yes', 'no']);
            $table->enum('legalPermissions', ['yes', 'no']);
            $table->string('permittedType')->nullable();
            $table->string('area')->nullable();
            $table->string('bedType')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicals');
    }
};
