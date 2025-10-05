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
        Schema::create('clinical_assessments', function (Blueprint $table) {
            $table->id();
            $table->string("inquiry_number")->nullable();
            $table->string("assess_name")->nullable();
            $table->string("referral_source")->nullable();
            $table->string("discussed")->nullable();
            $table->string("mother_msl")->nullable();
            $table->string("father_msl")->nullable();
            $table->string("caregiver_msl")->nullable();
            $table->string("whom_msl")->nullable();
            $table->string("caregiver_name")->nullable();
            $table->string("other_infomration")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_assessments');
    }
};
