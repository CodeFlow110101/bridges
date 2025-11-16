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
        Schema::create('mou_moa', function (Blueprint $table) {
            $table->id();
            $table->string("second_party_name");
            $table->string("second_party_location")->nullable();
            $table->date("date_of_amendment")->nullable();
            $table->date("date_of_termination")->nullable();
            $table->string("set_alert_for_renewal")->nullable();
            $table->string("branch")->nullable();
            $table->string("contract_validity_till_no_of_years")->nullable();
            $table->longText("contract")->nullable();
            $table->string("speech_therapy_cost")->nullable();
            $table->string("occupational_therapy_cost")->nullable();
            $table->string("behavioural_therapy_cost")->nullable();
            $table->string("psychoeducational_assessment_cost")->nullable();
            $table->string("physiotherapy_cost")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_moa');
    }
};
