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
        Schema::create('kpi_target_3', function (Blueprint $table) {
            $table->id();
            $table->integer("key_performance_indicators_id");
            $table->integer("communication_skills")->nullable();
            $table->integer("decision_making")->nullable();
            $table->integer("initiation")->nullable();
            $table->integer("consistent_performance")->nullable();
            $table->integer("grooming_presentation_skills")->nullable();
            $table->integer("teamwork")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_target_3');
    }
};
