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
        Schema::create('kpi_target_2', function (Blueprint $table) {
            $table->id();
            $table->integer("key_performance_indicators_id");
            $table->integer("planning_of_session")->nullable();
            $table->integer("supporting_fellow_therapist")->nullable();
            $table->integer("creativity_customization_as_per_client")->nullable();
            $table->integer("clean_and_organized_station")->nullable();
            $table->integer("problem_solving")->nullable();
            $table->integer("counselling")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_target_2');
    }
};
