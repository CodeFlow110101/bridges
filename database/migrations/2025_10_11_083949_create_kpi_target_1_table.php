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
        Schema::create('kpi_target_1', function (Blueprint $table) {
            $table->id();
            $table->integer("key_performance_indicators_id");
            $table->integer("attendance_reporting_time");
            $table->integer("rapport_with_administration_desk");
            $table->integer("report_writing_skills");
            $table->integer("maintaining_body_checklist");
            $table->integer("property_premise_care");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_target_1');
    }
};
