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
        Schema::create('donors', function (Blueprint $table) {
            $table->id("donor_id");
            $table->string('partner_name');
            $table->string('short_name');
            $table->string('partner_website');
            $table->string('type_of_partner');
            $table->string('type_of_fund');
            $table->string('contact_person');
            $table->string('support_date');
            $table->string('contact_email');
            $table->bigInteger('contact_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
