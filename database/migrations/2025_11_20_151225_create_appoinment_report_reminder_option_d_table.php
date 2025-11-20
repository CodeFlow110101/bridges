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
        Schema::create('appoinment_report_reminder_option_d', function (Blueprint $table) {
            $table->id();
            $table->integer("appoinment_report_reminder_id");
            $table->time("start_time");
            $table->time("end_time");
            $table->boolean("monday")->default(false);
            $table->boolean("tuesday")->default(false);
            $table->boolean("wednesday")->default(false);
            $table->boolean("thursday")->default(false);
            $table->boolean("friday")->default(false);
            $table->boolean("saturday")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinment_report_reminder_option_d');
    }
};
