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
        Schema::table('clinical_assessments', function (Blueprint $table) {
            $table->renameColumn("assess_name", "name");
            $table->longText("discussed")->change();
            $table->dropColumn([
                'mother_msl',
                'father_msl',
                'caregiver_msl',
                'whom_msl',
            ]);
            $table->longText("investigation_procedure")->nullable();
            $table->longText("client_revisit_information")->nullable();
            $table->longText("case_history")->nullable();
            $table->longText("assessment")->nullable();
            $table->string("therapy_enrollment")->nullable();
            $table->string("supervisors_name")->nullable();
            $table->boolean("is_document_provided")->nullable();
            $table->longText("information_to_be_aware_of")->nullable();
            $table->longText("future_reference")->nullable();
        });

        Schema::table('clinical_assessments', function (Blueprint $table) {
            $table->integer('mother_msl')->nullable();
            $table->integer('father_msl')->nullable();
            $table->integer('caregiver_msl')->nullable();
            $table->integer('whom_msl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clinical_assessments', function (Blueprint $table) {
            //
        });
    }
};
