<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicalAssessment extends Model
{
    protected $table = "clinical_assessments";
    protected $fillable = [
        'inquiry_number',
        'assess_name',
        'referral_source',
        'discussed',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_information',
    ];
}
