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
        Schema::create('cultural_centres', function (Blueprint $table) {
            $table->id('culturalcentreId');
            $table->string('applicationId');
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
            $table->string('contactNumber1');
            $table->string('contactNumber2');
            $table->string('submittedBefore');
            $table->string('receivedSupport');
            $table->string('mahalluName');
            $table->string('mahalluLocation');
            $table->string('mahalluVillage');
            $table->string('mahalluDistrict');
            $table->string('mahalluState');
            $table->integer('noOfFamilies');
            $table->string('requirement');
            $table->string('hasBuilding');
            $table->string('buildingStatus')->nullable();
            $table->string('culturalCenter');
            $table->integer('distanceToCulturalCenter');
            $table->integer('benefitedHouseholds');
            $table->string('projectType');
            $table->integer('buildingArea');
            $table->integer('landArea');
            $table->decimal('proposedBudget', 15, 2);
            $table->integer('proposedBeneficiary');
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
        Schema::dropIfExists('cultural_centres');
    }
};
