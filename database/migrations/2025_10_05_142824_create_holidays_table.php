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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_number');
            $table->string('holiday_name');
            $table->date('date_of_birth')->nullable();
            $table->string('mother_msl')->nullable();
            $table->string('father_msl')->nullable();
            $table->string('caregiver_msl')->nullable();
            $table->string('whom_msl')->nullable();
            $table->string('caregiver_name')->nullable();
            $table->string('other_infomration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
