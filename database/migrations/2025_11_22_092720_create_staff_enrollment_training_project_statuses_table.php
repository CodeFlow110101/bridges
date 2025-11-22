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
        Schema::create('staff_enrollment_training_project_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer("training_id");
            $table->longText("project");
            $table->integer("status");
            $table->date("date_of_completion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_enrollment_training_project_statuses');
    }
};
