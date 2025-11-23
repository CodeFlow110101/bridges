<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemonstrationTherapy extends Model
{
    protected $table = "demonstration_therapies";

    protected $fillable = [
        'inquiry_number',
        'name',
        'session_date',
        'date_of_birth',
        'caregiver_name',
        'other_infomration',
        'date',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'other_information',
        'approach_used',
        'concern_of_patient',
        'information_from_parent',
        'client_observations',
        'supervisor_to_be_aware_of',
        'session_report',
    ];


    public static function mslOptions()
    {
        return collect([
            "Difficult",
            "Sensitive",
            "Concerned",
            "Unaware",
            "Supportive",
            "Denial",
            "Demanding",
            "Impolite",
            "Language Barrier",
        ]);
    }
}
