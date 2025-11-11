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
        Schema::create('long_term_clients', function (Blueprint $table) {
            $table->id();
            $table->string("enquiry_number");
            $table->string("client_name");
            $table->text("client_letter_of_discount")->nullable();
            $table->text("reply_from_clinical_manager")->nullable();
            $table->date("email_recieved_from_parent_date")->nullable();
            $table->date("date_when_email_replied")->nullable();
            $table->date("email_date_from_forwarded")->nullable();
            $table->text("email_address_forwarded_through")->nullable();
            $table->text("conditions_discovered")->nullable();
            $table->string("cheque_no")->nullable();
            $table->string("cost_on_cheque")->nullable();
            $table->string("contract_no_of_months")->nullable();
            $table->string("alert_to_generate_on")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('long_term_clients');
    }
};
