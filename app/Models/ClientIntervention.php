<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientIntervention extends Model
{
    protected $table = "client_interventions";

    protected $fillable = [
        'inquiry_id',
        'name',
        'date_of_birth',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_infomration',
        'approach_used',
        'concern_of_patient',
        'information_from_parent',
        'client_observations',
        'supervisor_to_be_aware_of',
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
