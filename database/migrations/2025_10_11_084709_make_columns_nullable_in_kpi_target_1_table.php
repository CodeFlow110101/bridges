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
        Schema::table('kpi_target_1', function (Blueprint $table) {
            $table->integer("attendance_reporting_time")->nullable()->change();
            $table->integer("rapport_with_administration_desk")->nullable()->change();
            $table->integer("report_writing_skills")->nullable()->change();
            $table->integer("maintaining_body_checklist")->nullable()->change();
            $table->integer("property_premise_care")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kpi_target_1', function (Blueprint $table) {
            //
        });
    }
};
