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
        Schema::table('warning_letters', function (Blueprint $table) {
            $table->text('brief_description_of_the_issue_concern')->nullable()->change();
            $table->text('describe_any_relevant_background_information_or_events_leading_up_to_the_problem')->nullable()->change();
            $table->text('explain_the_effects_or_consequences_of_the_problem')->nullable()->change();
            $table->date('should_be_completed_by_deadline')->nullable()->change();
            $table->string('email_address_to_respond_to')->nullable()->change();
            $table->date('date_when_address_appropriately')->nullable()->change();
            $table->text('response')->nullable()->change();
            $table->string('responded_by')->nullable()->change();
            $table->text('conclusion')->nullable()->change();
            $table->text('any_document')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warning_letters', function (Blueprint $table) {
            //
        });
    }
};
