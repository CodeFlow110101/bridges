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
        Schema::table('key_performance_indicators', function (Blueprint $table) {
            $table->longText('employee_signature')->nullable();
            $table->longText('hod_supervisor_signature')->nullable();
            $table->longText('hrs_signature')->nullable();
            $table->longText('directors_signature')->nullable();
            $table->longText('hod_supervisor_2nd_signature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_performance_indicators', function (Blueprint $table) {
            //
        });
    }
};
