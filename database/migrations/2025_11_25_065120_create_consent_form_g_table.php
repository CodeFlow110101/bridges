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
        Schema::create('consent_form_g', function (Blueprint $table) {
            $table->id();
            $table->longText("location_of_recording")->nullable();
            $table->date("date_and_time_of_signing")->nullable();
            $table->string("name")->nullable();
            $table->string("age")->nullable();
            $table->string("gender")->nullable();
            $table->longText("signature")->nullable();
            $table->longText("parent_signature")->nullable();
            $table->string("parent_name")->nullable();
            $table->string("therapist_name")->nullable();
            $table->longText("therapist_signature")->nullable();
            $table->string("witness_name")->nullable();
            $table->longText("witness_signature")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_form_g');
    }
};
