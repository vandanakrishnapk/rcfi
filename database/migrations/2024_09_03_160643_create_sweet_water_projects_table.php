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
        Schema::create('sweet_water_projects', function (Blueprint $table) {
            $table->id('sweetwaterId');
            $table->string('applicationId');
            $table->string('applicantName');
            $table->string('location');
            $table->text('address');
            $table->string('village');
            $table->string('post');
            $table->string('panchayath');
            $table->string('district');
            $table->string('state');
            $table->string('pin');
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->json('beneficiaries'); // Store as JSON if the format is dynamic
            $table->integer('noOfBenefitedPeople');
            $table->integer('totalMale');
            $table->integer('totalFemale');
            $table->string('jobOfApplicant');
            $table->decimal('averageMonthlyIncome', 10, 2);
            $table->text('ownerOfLand');
            $table->text('addressOfLandOwner');
            $table->string('place');
            $table->string('postLandOwner');
            $table->string('panchayathLandOwner');
            $table->string('districtLandOwner');
            $table->string('mobileLandOwner');
            $table->string('typeOfWell');
            $table->decimal('expectedDepth', 10, 2);
            $table->decimal('diameter', 10, 2);
            $table->decimal('budgetEstimated', 10, 2);
            $table->string('natureOfLand');
            $table->text('currentWaterSource');
            $table->string('needElectricPump');
            $table->string('usedForAgriculture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sweet_water_projects');
    }
};
