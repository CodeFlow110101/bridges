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
        Schema::create('moms', function (Blueprint $table) {
            $table->id();
            $table->string("inquiry_number");
            $table->string("name");
            $table->date("date_of_birth")->nullable();
            $table->date("session_date")->nullable();
            $table->date("date_of_mom")->nullable();
            $table->longText("things_to_be_followed_by_supervisor")->nullable();
            $table->longText("things_to_be_followed_by_parent")->nullable();
            $table->longText("file")->nullable();
            $table->date("meeting_date")->nullable();
            $table->date("date_of_email_sent")->nullable();
            $table->string("email_from")->nullable();
            $table->string("email_to")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moms');
    }
};
