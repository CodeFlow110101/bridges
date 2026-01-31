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
        Schema::table('long_term_clients', function (Blueprint $table) {
            $table->string("cheque_name")->nullable();
            $table->date("cheque_date")->nullable();
            $table->text("check_photo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('long_term_clients', function (Blueprint $table) {
            //
        });
    }
};
