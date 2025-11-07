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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->string("inquiry_number");
            $table->date("date");
            $table->string("name");
            $table->text("referral_source")->nullable();
            $table->text("details_discussed")->nullable();
            $table->integer("mother_msl_1")->nullable();
            $table->integer("mother_msl_2")->nullable();
            $table->integer("father_msl_1")->nullable();
            $table->integer("father_msl_2")->nullable();
            $table->integer("caregiver_msl_1")->nullable();
            $table->integer("caregiver_msl_2")->nullable();
            $table->integer("communicate_to")->nullable();
            $table->string("caregiver_name")->nullable();
            $table->text("caregiver_relationship")->nullable();
            $table->text("caregiver_other_info")->nullable();
            $table->boolean("has_caregiver_relevant_info")->default(false);
            $table->text("caregiver_relevant_info")->nullable();
            $table->boolean("is_first_therapy")->default(false);
            $table->integer("if_not_first_therapy")->nullable();
            $table->text("if_not_other_first_therapy_description")->nullable();
            $table->integer("has_insurance_coverage")->nullable();
            $table->string("insurance_name")->nullable();
            $table->text("insurance_services_covered")->nullable();
            $table->text("cost_services")->nullable();
            $table->text("cost_services_file")->nullable();
            $table->string("therapist_name")->nullable();
            $table->string("supervisor_name")->nullable();
            $table->boolean("is_schedule")->default(false);
            $table->date("schedule_date_time")->nullable();
            $table->string("schedule_supervisor_name")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
