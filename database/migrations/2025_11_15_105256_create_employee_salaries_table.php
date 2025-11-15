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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("company_name");
            $table->string("designation")->nullable();
            $table->date("joining_date");
            $table->string("emergency_contact_details")->nullable();
            $table->date("pay_period")->nullable();
            $table->string("basic_salary")->nullable();
            $table->string("hra")->nullable();
            $table->string("other_allowances")->nullable();
            $table->text("loss_of_pay")->nullable();
            $table->string("loss_of_pay_amount")->nullable();
            $table->string("total_earnings")->nullable();
            $table->string("total_advance_taken")->nullable();
            $table->string("total_advance_balance")->nullable();
            $table->text("advance_deductions")->nullable();
            $table->text("other_deductions")->nullable();
            $table->text("total_deductions")->nullable();
            $table->string("final_salary")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
