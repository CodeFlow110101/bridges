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
        Schema::create('appoinment_report_reminders', function (Blueprint $table) {
            $table->id();
            $table->string("client_name");
            $table->date("date_and_time")->nullable();
            $table->string("phone_no_dubai")->nullable();
            $table->integer("phase")->nullabel();
            $table->string("pattern")->nullable();
            $table->string("client_name_intervention")->nullable();
            $table->date("option_a_date_time")->nullable();
            $table->string("option_a_phone_no_dubai")->nullable();
            $table->integer("option_b_multiple_days_intervention")->nullable();
            $table->date("option_b_therapist_date_time")->nullable();
            $table->integer("option_b_time_session_booked")->nullable();
            $table->integer("option_b_department")->nullable();
            $table->date("option_c_date")->nullable();
            $table->string("inquiry_number")->nullable();
            $table->integer("consent_to")->nullable();
            $table->string("consent_to_insurance_name")->nullable();
            $table->integer("form_a_consent_to_school")->nullable();
            $table->string("form_a_consent_to_school_insurance_name")->nullable();
            $table->integer("form_b_consent_to_electronic_transfer")->nullable();
            $table->string("form_b_consent_to_electronic_transfer_insurance_name")->nullable();
            $table->integer("form_c_consent_to_social_media")->nullable();
            $table->string("form_c_consent_to_social_media_insurance_name")->nullable();
            $table->integer("form_e_allow_kid_to_dispatch")->nullable();
            $table->string("form_e_allow_kid_to_dispatch_insurance_name")->nullable();
            $table->integer("form_f_consent_to_group")->nullable();
            $table->string("form_f_consent_to_group_insurance_name")->nullable();
            $table->integer("form_d_consent_to_medicine")->nullable();
            $table->string("form_d_consent_to_medicine_insurance_name")->nullable();
            $table->integer("form_h_consent_to_enrolment")->nullable();
            $table->string("form_h_consent_to_enrolment_insurance_name")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinment_report_reminders');
    }
};
