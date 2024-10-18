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
        Schema::create('shops', function (Blueprint $table) {
            $table->id('shopId');
            $table->string('applicantName');
            $table->string('committeeName');
            $table->string('registerNumber');
            $table->year('year');
            $table->string('place');
            $table->string('village');
            $table->string('post');
            $table->string('panchayat');
            $table->string('district1');
            $table->string('state1');
            $table->string('mobileNumber1');
            $table->string('mobileNumber2');
            $table->string('mahalName');
            $table->string('location');
            $table->string('district2');
            $table->string('state2');
            $table->string('isBuildingCurrent');
            $table->text('currentStatus')->nullable();
            $table->integer('buildingArea');
            $table->string('placeStreet');
            $table->decimal('estimatedAmount', 10, 2);
            $table->integer('familiesBenefited');
            $table->string('legalPermissions');
            $table->string('typeApproved');
            $table->string('area');
            $table->integer('numberOfRooms');  
            $table->string('office_use')->nullable();          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
