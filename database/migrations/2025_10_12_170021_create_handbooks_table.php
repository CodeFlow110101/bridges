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
        Schema::create('handbooks', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("probation")->nullable();
            $table->string("hours_of_work_1")->nullable();
            $table->string("hours_of_work_2")->nullable();
            $table->string("first_party_user_id")->nullable();
            $table->string("first_party_position")->nullable();
            $table->string("contact_details_id")->nullable();
            $table->longText("first_party_signature")->nullable();
            $table->string("second_party_name")->nullable();
            $table->string("second_party_passport_number")->nullable();
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
        Schema::dropIfExists('handbooks');
    }
};
