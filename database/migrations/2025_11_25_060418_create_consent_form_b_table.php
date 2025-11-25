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
        Schema::create('consent_form_b', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("date_of_birth")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("school_name")->nullable();
            $table->string("school_email")->nullable();
            $table->string("school_phone_no")->nullable();
            $table->string("parent_name")->nullable();
            $table->longText("parent_signature")->nullable();
            $table->date("date")->nullable();
            $table->longText("signature")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_form_b');
    }
};
