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
        Schema::create('appoinment_report_reminder_form_g', function (Blueprint $table) {
            $table->id();
            $table->integer("appoinment_report_reminder_id");
            $table->string("client_name")->nullable();
            $table->boolean("form_a")->default(false);
            $table->boolean("form_b")->default(false);
            $table->boolean("form_c")->default(false);
            $table->boolean("form_d")->default(false);
            $table->boolean("form_e")->default(false);
            $table->boolean("form_f")->default(false);
            $table->boolean("form_g")->default(false);
            $table->boolean("form_h")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinment_report_reminder_form_g');
    }
};
