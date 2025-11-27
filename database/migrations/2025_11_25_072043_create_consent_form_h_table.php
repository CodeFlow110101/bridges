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
        Schema::create('consent_form_h', function (Blueprint $table) {
            $table->id();
            $table->longText("signature")->nullable();
            $table->date("date_and_time")->nullable();
            $table->string("name")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("parent_name")->nullable();
            $table->text("address")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("therapist_name")->nullable();
            $table->longText("therapist_signature")->nullable();
            $table->longText("witness_signature")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_form_h');
    }
};
