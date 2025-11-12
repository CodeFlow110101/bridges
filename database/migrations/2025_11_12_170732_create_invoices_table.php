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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date("date_and_time");
            $table->string("client_name");
            $table->string("client_id");
            $table->string("invoice_number")->nullable();
            $table->integer("department_id")->nullbale();
            $table->text("other")->nullable();
            $table->string("no_of_sessions")->nullable();
            $table->integer('service')->nullable();
            $table->string("amount")->nullable();
            $table->integer("method")->nullable();
            $table->string("validity_of_period_for_amount_paid")->nullable();
            $table->string("cheque_no")->nullable();
            $table->date("cheque_date")->nullable();
            $table->string("bank_transaction_no")->nullable();
            $table->string("skiply")->nullable();
            $table->text("comment")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
