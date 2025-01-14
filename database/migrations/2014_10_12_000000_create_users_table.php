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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('mobile');
            $table->tinyInteger('role')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('designation');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('house_name_or_number')->nullable();
            $table->string('place')->nullable();
            $table->string('po')->nullable(); // PO could mean Post Office
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('mobile_professional')->nullable();
            $table->string('email_professional')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('pan_card_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('ifsc_code')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
