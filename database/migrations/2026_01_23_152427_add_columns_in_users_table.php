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
        Schema::table('users', function (Blueprint $table) {
            // India contact
            $table->string('permanent_telephone_india')->nullable();   // Permanent telephone number in India
            $table->text('permanent_address_india')->nullable();       // Permanent address in India

            // Relative in Dubai
            $table->string('relative_name_dubai')->nullable();         // Relative in Dubai
            $table->string('relative_contact_dubai')->nullable();      // Contact number of relative
            $table->text('relative_address_dubai')->nullable();        // Address of relative

            // Friend in Dubai
            $table->string('friend_name_dubai')->nullable();           // Friend in Dubai
            $table->string('friend_contact_dubai')->nullable();        // Contact number of close friend
            $table->text('friend_address_dubai')->nullable();          // Address of friend

            // Medical
            $table->text('medical_concern')->nullable();               // Medical concern/ailment
            $table->text('medications')->nullable();                   // Medicines being consumed
            $table->string('doctor_or_clinic')->nullable();            // Doctor or clinic they visit

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
