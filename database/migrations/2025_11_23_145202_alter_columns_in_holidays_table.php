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
        Schema::table('holidays', function (Blueprint $table) {
            $table->renameColumn('holiday_name', 'name');

            $table->dropColumn([
                'mother_msl',
                'father_msl',
                'caregiver_msl',
                'whom_msl',
            ]);

            $table->string("caregiver_name")->nullable()->change();
            $table->longText("other_information")->nullable();
            $table->longText("approach_used")->nullable();
            $table->longText("concern_of_patient")->nullable();
            $table->longText("information_from_parent")->nullable();
            $table->longText("client_observations")->nullable();
            $table->longText("supervisor_to_be_aware_of")->nullable();
            $table->longText("cheat_sheet")->nullable();
            $table->date("date_of_upload")->nullable();
        });

        Schema::table('holidays', function (Blueprint $table) {
            $table->integer('mother_msl')->nullable();
            $table->integer('father_msl')->nullable();
            $table->integer('caregiver_msl')->nullable();
            $table->integer('whom_msl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('holidays', function (Blueprint $table) {
            //
        });
    }
};
