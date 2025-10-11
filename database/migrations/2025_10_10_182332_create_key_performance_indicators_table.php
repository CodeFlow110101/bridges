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
        Schema::create('key_performance_indicators', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->date("date");
            $table->string("evaluation_period");
            $table->text("quarter_1")->nullable();
            $table->text("quarter_2")->nullable();
            $table->text("quarter_3")->nullable();
            $table->text("quarter_4")->nullable();
            $table->text("quarter_5")->nullable();
            $table->string("rating")->nullable();
            $table->string("performance_score")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_performance_indicators');
    }
};
