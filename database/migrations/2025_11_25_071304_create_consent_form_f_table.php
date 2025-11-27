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
        Schema::create('consent_form_f', function (Blueprint $table) {
            $table->id();
            $table->string("child_name")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->string("authorized_person_name")->nullable();
            $table->string("authorized_person_phone_no")->nullable();
            $table->string("authorized_person_relationship")->nullable();
            $table->string("authorized_person_email")->nullable();
            $table->longText("authorized_person_id")->nullable();
            $table->string("parent_name")->nullable();
            $table->string("parent_signature")->nullable();
            $table->string("relation")->nullable();
            $table->date("date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_form_f');
    }
};
