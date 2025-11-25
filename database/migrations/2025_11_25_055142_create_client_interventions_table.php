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
        Schema::create('client_interventions', function (Blueprint $table) {
            $table->id();
            $table->string("inquiry_number");
            $table->string("name");
            $table->date("date_of_birth")->nullable();
            $table->string("mother_msl")->nullable();
            $table->string("father_msl")->nullable();
            $table->string("caregiver_msl")->nullable();
            $table->string("whom_msl")->nullable();
            $table->string("caregiver_name")->nullable();
            $table->string("other_infomration")->nullable();
            $table->longText("approach_used")->nullable();
            $table->longText("concern_of_patient")->nullable();
            $table->longText("information_from_parent")->nullable();
            $table->longText("client_observations")->nullable();
            $table->longText("supervisor_to_be_aware_of")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_interventions');
    }
};
