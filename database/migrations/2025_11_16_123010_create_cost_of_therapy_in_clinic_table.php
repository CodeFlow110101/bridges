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
        Schema::create('cost_of_therapy_in_clinic', function (Blueprint $table) {
            $table->id();
            $table->integer("mou_moa_id");
            $table->string("location");
            $table->string("cost")->nullable();
            $table->date("time")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_of_therapy_in_clinic');
    }
};
