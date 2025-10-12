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
        Schema::create('induction_programs', function (Blueprint $table) {
            $table->id();

            $table->integer("user_id");
            $table->date("date");
            $table->string("hr_name")->nullable();
            $table->date("hr_date")->nullable();
            $table->longText("hr_signature")->nullable();
            $table->string("first_party_name")->nullable();
            $table->string("first_party_position")->nullable();
            $table->longText("first_party_signature")->nullable();
            $table->string("second_party_name")->nullable();
            $table->string("second_party_passport_number")->nullable();
            $table->text("second_party_current_address")->nullable();
            $table->date("second_party_date")->nullable();

            $table->boolean('df')->default(false);      // Department function
            $table->boolean('itc')->default(false);     // Introduction to colleagues
            $table->boolean('neoj')->default(false);    // New entrant’s own job
            $table->boolean('sup')->default(false);     // Supervision
            $table->boolean('gle')->default(false);     // General layout entrances/exits

            // Conditions of Employment
            $table->boolean('iohow')->default(false);   // Information on hours of work
            $table->boolean('trfpeiam')->default(false); // Time recording, finger punching, Email, Attendance
            $table->boolean('jd')->default(false);      // Job description
            $table->boolean('ppoe')->default(false);    // Probationary periods
            $table->boolean('btcnaof')->default(false); // Breaking contract
            $table->boolean('riwsiwol')->default(false); // Reporting in sick/leave
            $table->boolean('afrlalslel')->default(false); // Arrangements for requesting leave
            $table->boolean('uauppcrditc')->default(false); // Uniforms/policy
            $table->boolean('dcglosapcp')->default(false);  // DHA/CDA/Child protection
            $table->boolean('dwtpc')->default(false);       // Dealing with parents/clients
            $table->boolean('mrpomrad')->default(false);    // Medical records

            // Health & Safety
            $table->boolean('has')->default(false);    // Health & safety info
            $table->boolean('iofiap')->default(false); // Fire instructions
            $table->boolean('loffe')->default(false);  // Location of fire-fighting equipment
            $table->boolean('apicof')->default(false); // Assembly point in case of fire
            $table->boolean('air')->default(false);    // Accident/incident reporting
            $table->boolean('faf')->default(false);    // First aid facilities
            $table->boolean('lopi')->default(false);   // Loss of personal items
            $table->boolean('cowatm')->default(false); // Cleanliness & toy management
            $table->boolean('afkibfcme')->default(false); // Keys/ID badges/flashcards
            $table->boolean('wm')->default(false);     // Waste management
            $table->boolean('vaab')->default(false);   // Violence & aggressive behaviour
            $table->boolean('ic')->default(false);     // Infection control
            $table->boolean('mipaatt')->default(false); // Major incident procedures

            // Conduct
            $table->boolean('pp')->default(false);     // Personal presentation
            $table->boolean('dp')->default(false);     // Disciplinary procedures
            $table->boolean('cttcatp')->default(false); // Courtesy to customer/public
            $table->boolean('con')->default(false);    // Confidentiality
            $table->boolean('nc')->default(false);     // Noise control
            $table->boolean('aog')->default(false);    // Acceptance of gifts
            $table->boolean('lrrs')->default(false);   // Local rules regarding smoking
            $table->boolean('puot')->default(false);   // Private use of telephones
            $table->boolean('sobc')->default(false);   // Standards of business conduct

            // Facilities
            $table->boolean('pan')->default(false);    // Pantry
            $table->boolean('wash')->default(false);   // Washroom

            // Training & Promotion
            $table->boolean('moapo')->default(false);  // Means of advancement/promotion
            $table->boolean('ears')->default(false);   // Employee appraisal/review
            $table->boolean('cpapacoe')->default(false); // Company policies & Code of Ethics

            // Communication
            $table->boolean('super')->default(false);  // Supervisors
            $table->boolean('cam')->default(false);    // Communication arrangements
            $table->boolean('isegnbce')->default(false); // Info sources / notice boards
            $table->boolean('hc')->default(false);     // Handling complaints
            $table->boolean('pcb')->default(false);    // Parent’s communication book

            // Department-specific
            $table->boolean('pay')->default(false);    // Payroll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('induction_programs');
    }
};
