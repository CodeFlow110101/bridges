<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppoinmentReportReminder extends Model
{
    protected $table = "appoinment_report_reminders";

    protected $fillable = [
        'client_name',
        'date_and_time',
        'phone_no_dubai',
        'phase',
        'pattern',
        'client_name_intervention',
        'option_a_date_time',
        'option_a_phone_no_dubai',
        'option_b_multiple_days_intervention',
        'option_b_therapist_date_time',
        'option_b_time_session_booked',
        'option_b_department',
        'option_c_date',
        'inquiry_id',
        'consent_to',
        'consent_to_insurance_name',
        'form_a_consent_to_school',
        'form_a_consent_to_school_insurance_name',
        'form_b_consent_to_electronic_transfer',
        'form_b_consent_to_electronic_transfer_insurance_name',
        'form_c_consent_to_social_media',
        'form_c_consent_to_social_media_insurance_name',
        'form_e_allow_kid_to_dispatch',
        'form_e_allow_kid_to_dispatch_insurance_name',
        'form_f_consent_to_group',
        'form_f_consent_to_group_insurance_name',
        'form_d_consent_to_medicine',
        'form_d_consent_to_medicine_insurance_name',
        'form_h_consent_to_enrolment',
        'form_h_consent_to_enrolment_insurance_name',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class, "inquiry_id", "id");
    }

    public function optionc(): HasMany
    {
        return $this->hasMany(AppoinmentReportReminderOptionC::class, "appoinment_report_reminder_id", "id");
    }

    public function optiond(): HasMany
    {
        return $this->hasMany(AppoinmentReportReminderOptionD::class, "appoinment_report_reminder_id", "id");
    }

    public function formg(): HasMany
    {
        return $this->hasMany(AppoinmentReportReminderFormG::class, "appoinment_report_reminder_id", "id");
    }
}
