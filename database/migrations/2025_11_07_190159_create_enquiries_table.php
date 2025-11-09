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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string("inquiry_number")->nullable();
            $table->date('date')->nullable();
            $table->string("name")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("school")->nullable();
            $table->integer("is_insurance_covered")->nullable();
            $table->string("insurance_name")->nullable();
            $table->integer("referral_source")->nullable();
            $table->integer("referral_source_name")->nullable();
            $table->integer("inquired_service")->nullable();
            $table->string("other_service")->nullable();
            $table->boolean("has_taken_intervention_before")->default(false);
            $table->text("intervention_details")->nullable();
            $table->boolean("is_assessment_required")->default(false);
            $table->text("assessment_details")->nullable();
            $table->string("cost_of_service")->nullable();
            $table->boolean("is_report_provided")->default(false);
            $table->text("other_info")->nullable();
            $table->boolean("is_client_satisfied")->default(false);
            $table->date("date_of_enquiry_answered")->nullable();
            $table->text("description_of_response")->nullable();
            $table->boolean("is_appoinment_booked")->default(false);
            $table->date("appoinment_date_and_time")->nullable();
            $table->string("supervisor_name")->nullable();
            $table->text("details_when_appoinment_not_booked")->nullable();
            $table->boolean("has_scheduled_session")->default(false);
            $table->date("session_date_and_time")->nullable();
            $table->string("session_supervisor_name")->nullable();
            $table->text("details_when_session_not_scheduled")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
