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
        Schema::create('consent_form_c', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("date_of_birth")->nullable();
            $table->string("phone_no")->nullable();
            $table->string("email")->nullable();
            $table->longText("signature")->nullable();
            $table->date("date")->nullable();
            $table->string("organization_name")->nullable();
            $table->string("organization_phone_no")->nullable();
            $table->longText("organization_address")->nullable();
            $table->longText("organization_email")->nullable();
            $table->longText("parent_signature")->nullable();
            $table->longText("witness_signature")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_form_c');
    }
};
