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
        Schema::create('markaz_orphan_cares', function (Blueprint $table) {
            $table->id('orphancareId');
            $table->string('nameOfOrphan');
            $table->string('nameOfFather');
            $table->string('nameOfGrandFather')->nullable();
            $table->string('nameOfMother')->nullable();
            $table->string('nameOfMothersFather')->nullable();
            $table->string('maleOrFemale');
            $table->date('dateOfBirth');
            $table->integer('age');
            $table->string('aadharNumber')->unique();
            $table->string('nameOfPresentGuardian');
            $table->string('relationWithOrphan');
            $table->date('dateOfDeathOfFather')->nullable();
            $table->string('causeOfDeath')->nullable();
            $table->string('motherAliveOrNot');
            $table->date('motherDateOfDeath')->nullable();
            $table->string('motherCauseOfDeath')->nullable();
            $table->string('motherReMarriedOrNot');
            $table->integer('noOfBrothersAndSisters');
            $table->integer('maleSiblings');
            $table->integer('femaleSiblings');
            $table->decimal('monthlyIncome', 10, 2);
            $table->decimal('monthlyExpense', 10, 2);
            $table->string('typeOfHouse');
            $table->string('nameOfSchool')->nullable();
            $table->string('classSchool')->nullable();
            $table->string('nameOfMadrassa')->nullable();
            $table->string('classMadrassa')->nullable();
            $table->text('notStudyReason')->nullable();
            $table->text('healthStatus')->nullable();
            $table->text('sponsershipDetails')->nullable();
            $table->string('houseName')->nullable();
            $table->string('place')->nullable();
            $table->string('town')->nullable();
            $table->string('postOffice')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pinCode')->nullable();
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markaz_orphan_cares');
    }
};
