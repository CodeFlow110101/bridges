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
            $table->boolean("introduction_to_director")->default(false);
            $table->boolean("introduction_to_supervisors")->default(false);
            $table->boolean("introduction_to_pantry_area")->default(false);
            $table->boolean("introduction_to_toy_room_work_area")->default(false);
            $table->boolean("introduction_to_resource_room")->default(false);
            $table->boolean("introduction_to_training_area")->default(false);
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
