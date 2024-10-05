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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('documentId');
            $table->unsignedBigInteger('proId');
            $table->string('land_document')->nullable();
            $table->string('possession_certificate')->nullable();
            $table->string('recommendation_letter')->nullable();
            $table->string('committee_minutes')->nullable();
            $table->string('permit_copy')->nullable();
            $table->string('plan')->nullable();
            $table->string('tender_schedule_sheet')->nullable();
            $table->string('site_study')->nullable();
            $table->string('quotations')->nullable(); // Consider how to store multiple quotations
            $table->string('quotations_approval_form')->nullable();
            $table->string('work_order_letter')->nullable();
            $table->string('meeting_minutes_copy')->nullable();
            $table->string('agreement_with_contractor')->nullable();
            $table->string('agreement_with_committee')->nullable();
            $table->string('project_summary_form')->nullable();
            
            $table->timestamps();
            $table->foreign('proId')->references('proId')->on('project_details')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
