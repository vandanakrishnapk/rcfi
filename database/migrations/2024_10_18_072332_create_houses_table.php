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
        Schema::create('houses', function (Blueprint $table) {
            $table->id('houseId');
            $table->string('applicationId');
            $table->string('name');
            $table->integer('age');
            $table->string('fathersName');
            $table->string('mothersName');
            $table->string('houseName');
            $table->string('location');
            $table->string('panchayat');
            $table->string('po');
            $table->string('district');
            $table->string('state');
            $table->string('pinCode');
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->enum('applicant', ['male', 'female']);
            $table->string('education')->nullable();
            $table->enum('married', ['yes', 'no']);
            $table->integer('childrenCount')->nullable();
            $table->integer('maleChildren')->nullable();
            $table->integer('femaleChildren')->nullable();
            $table->enum('occupation', ['yes', 'no']);
            $table->decimal('monthlyIncome', 10, 2)->nullable();
            $table->string('otherIncome')->nullable();
            $table->enum('healthStatus', ['satisfactory', 'chronically ill', 'differently abled']);
            $table->text('dailyTreatment')->nullable();
            $table->enum('accommodation', ['own house', 'ancestral home', 'rental home', 'other']);
            $table->enum('ownPlace', ['yes', 'no']);
            $table->string('measureOfLand')->nullable();
            $table->string('typeOfLand')->nullable();
            $table->string('desiredModel')->nullable();
            $table->integer('totalSqrFt')->nullable();
            $table->decimal('expectedAmount', 10, 2)->nullable();
            $table->enum('permission', ['yes', 'no']);
            $table->string('formOfIntendedHouse')->nullable();
            $table->string('officeUse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
