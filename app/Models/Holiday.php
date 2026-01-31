<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holiday extends Model
{
    protected $table = "holidays";

    protected $fillable = [
        'inquiry_id',
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

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class, "inquiry_id", "id");
    }

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
