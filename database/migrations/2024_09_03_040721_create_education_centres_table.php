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
        Schema::create('education_centres', function (Blueprint $table) {
            $table->id('educationcentreId');
            $table->string('applicantName');
            $table->string('committeeName');
            $table->string('regNumber');
            $table->string('year');
            $table->string('location');
            $table->string('village');
            $table->string('post');
            $table->string('panchayath');
            $table->string('district');
            $table->string('state');
            $table->string('contact1');
            $table->string('contact2');
            $table->string('submittedApplication');
            $table->string('financialSupport');
            $table->string('mahalluName');
            $table->string('mahalluLocation');
            $table->string('mahalluVillage');
            $table->string('mahalluDistrict');
            $table->string('mahalluState');
            $table->integer('noOfFamiliesInMahallu');
            $table->string('requirementRepairing');
            $table->string('proposedSiteBuilding');
            $table->string('currentBuildingStatus');
            $table->integer('studentsNumber');
            $table->integer('boysNumber');
            $table->integer('girlsNumber');
            $table->string('educationCenterNearby');
            $table->integer('culturalCentreDistance');
            $table->string('syllabus');
            $table->string('projectType');
            $table->integer('buildingArea');
            $table->integer('landArea');
            $table->integer('classroomsNumber');
            $table->integer('numberOfStudents');
            $table->integer('proposedBudget');
            $table->string('legalApprovals');
            $table->string('area');
            $table->timestamps();
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_centres');
    }
};
