<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicalAssessment extends Model
{
    protected $table = "clinical_assessments";

    protected $fillable = [
        'inquiry_id',
        'discussed',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_infomration',
        'investigation_procedure',
        'client_revisit_information',
        'case_history',
        'assessment',
        'therapy_enrollment',
        'supervisors_name',
        'is_document_provided',
        'information_to_be_aware_of',
        'future_reference',
        'document_description',
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
