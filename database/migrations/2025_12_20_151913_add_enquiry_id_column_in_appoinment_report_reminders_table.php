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
        Schema::table('appoinment_report_reminders', function (Blueprint $table) {
            $table->renameColumn('enquiry_id', 'inquiry_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appoinment_report_reminders', function (Blueprint $table) {
            //
        });
    }
};
