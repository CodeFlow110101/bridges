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
        Schema::create('warning_letters', function (Blueprint $table) {
            $table->id();
            $table->date("date_of_issue");
            $table->text("brief_description_of_the_issue_concern");
            $table->text("describe_any_relevant_background_information_or_events_leading_up_to_the_problem");
            $table->text("explain_the_effects_or_consequences_of_the_problem");
            $table->date("should_be_completed_by_deadline");
            $table->string("email_address_to_respond_to");
            $table->date("date_when_address_appropriately");
            $table->text("response");
            $table->string("responded_by");
            $table->text("conclusion");
            $table->text("any_document");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warning_letters');
    }
};
