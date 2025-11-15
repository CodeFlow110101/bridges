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
        Schema::create('staff_confidentiality_contracts', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("phone_no_id")->nullable();
            $table->integer("phone_no_dubai_id")->nullable();
            $table->integer("emergency_phone_no_id")->nullable();
            $table->integer("permanent_address_id")->nullable();
            $table->integer("temporary_address_id")->nullable();
            $table->integer("references_id")->nullable();
            $table->date("effective_date");
            $table->string("license")->nullable();
            $table->integer("first_party_user_id");
            $table->string("first_party_user_position")->nullable();
            $table->longText("first_party_user_signature")->nullable();
            $table->integer("first_party_user_emergency_phone_no_id")->nullable();
            $table->string("second_party_name")->nullable();
            $table->string("second_party_passport_no")->nullable();
            $table->text("second_party_current_address")->nullable();
            $table->date("second_party_date")->nullable();
            $table->longText("second_party_signature")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_confidentiality_contracts');
    }
};
