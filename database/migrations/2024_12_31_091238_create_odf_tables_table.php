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
        Schema::create('odf_tables', function (Blueprint $table) {
            $table->id();
            $table->string('agency_id');  // For the Agency ID field
            $table->unsignedBigInteger('donor_name');  // Assuming you have a 'donors' table for foreign key relation
            $table->string('application_id');  // Application ID (assuming it's a text field)
            $table->string('account_name');  // Bank Account Details
            $table->string('account_number');
            $table->string('ifsc_code');
            $table->string('bank_branch');
            $table->string('bank_name');
            $table->string('project_id');
            $table->string('cluster_name')->nullable();  // Cluster Name field (nullable if not required for certain projects)
            $table->string('project_type')->nullable(); 
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('donor_name')->references('donor_id')->on('donors')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odf_tables');
    }
};
