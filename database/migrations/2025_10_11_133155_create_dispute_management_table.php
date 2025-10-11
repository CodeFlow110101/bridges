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
        Schema::create('dispute_management', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->text("concern")->nullable();
            $table->string("email_to_forward")->nullable();
            $table->date("addressed_date")->nullable();
            $table->date("response_date")->nullable();
            $table->string("responded_by")->nullable();
            $table->text("conclusion")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispute_management');
    }
};
