<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquiries";

    protected $fillable = [
        'inquiry_number',
        'date',
        'name',
        'phone_no',
        'email',
        'school',
        'is_insurance_covered',
        'insurance_name',
        'referral_source',
        'referral_source_name',
        'inquired_service',
        'other_service',
        'has_taken_intervention_before',
        'intervention_details',
        'is_assessment_required',
        'assessment_details',
        'cost_of_service',
        'is_report_provided',
        'other_info',
        'is_client_satisfied',
        'is_client_satisfied_description',
        'date_of_enquiry_answered',
        'description_of_response',
        'is_appoinment_booked',
        'appoinment_date_and_time',
        'supervisor_name',
        'details_when_appoinment_not_booked',
        'has_scheduled_session',
        'session_date_and_time',
        'session_supervisor_name',
        'details_when_session_not_scheduled',
    ];

    public static function referralSourceOptions()
    {
        return [
            "Doctor",
            "School",
            "Friend/Relative",
            "Social Media",
            "Staff Member",
            "Other"
        ];
    }

    public static function enquiredServices()
    {
        return  [
            "Speech therapy",
            "Psychology/Counselling",
            "ABA/Beh. Therapy",
            "Readiness Program",
            "Occupational therapy/Sensory Integration",
            "Training programs",
            "Other",
        ];
    }
}
