<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = "interventions";

    protected $fillable = [
        'inquiry_number',
        'date',
        'name',
        'referral_source',
        'details_discussed',
        'mother_msl_1',
        'mother_msl_2',
        'father_msl_1',
        'father_msl_2',
        'caregiver_msl_1',
        'caregiver_msl_2',
        'communicate_to',
        'caregiver_name',
        'caregiver_relationship',
        'caregiver_other_info',
        'has_caregiver_relevant_info',
        'caregiver_relevant_info',
        'is_first_therapy',
        'if_not_first_therapy',
        'if_not_other_first_therapy_description',
        'has_insurance_coverage',
        'insurance_name',
        'insurance_services_covered',
        'cost_services',
        'cost_services_file',
        'therapist_name',
        'supervisor_name',
        'is_schedule',
        'schedule_date_time',
        'schedule_supervisor_name',
    ];

    public static function mslOptions1()
    {
        return collect([
            "Difficult",
            "Sensitive",
            "Concerned",
            "Unaware",
        ]);
    }

    public static function mslOptions2()
    {
        return collect([
            "Supportive",
            "Denial",
            "Demanding",
            "Impolite",
            "Language Barrier",
        ]);
    }

    public static function whomToCommunicateOptions()
    {
        return collect([
            "Mother",
            "Father",
            "Caregiver",
        ]);
    }

    public static function notFirstTherapyOptions()
    {
        return collect([
            "Reassign to another department",
            "Do not want to continue",
            "Next session is not required",
            "Other",
        ]);
    }

    public static function hasInsuranceCoverageOptions()
    {
        return collect([
            "Yes",
            "No",
            "Unaware",
        ]);
    }
}
