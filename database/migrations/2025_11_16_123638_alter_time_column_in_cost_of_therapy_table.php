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
        Schema::table('cost_of_therapy_in_clinic', function (Blueprint $table) {
            $table->dropColumn('time');
        });

        Schema::table('cost_of_therapy_in_clinic', function (Blueprint $table) {
            $table->time('time')->nullable();
        });

        Schema::table('cost_of_therapy_in_school', function (Blueprint $table) {
            $table->dropColumn('time');
        });

        Schema::table('cost_of_therapy_in_school', function (Blueprint $table) {
            $table->time('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cost_of_therapy', function (Blueprint $table) {
            //
        });
    }
};
