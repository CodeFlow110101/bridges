<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = "holidays";

    protected $fillable = [
        'inquiry_number',
        'name',
        'date_of_birth',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_infomration',
        'other_information',
        'approach_used',
        'concern_of_patient',
        'information_from_parent',
        'client_observations',
        'supervisor_to_be_aware_of',
        'cheat_sheet',
        'date_of_upload',
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
