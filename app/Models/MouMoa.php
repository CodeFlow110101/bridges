<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MouMoa extends Model
{
    protected $table = "mou_moa";

    protected $fillable = [
        'second_party_name',
        'second_party_location',
        'date_of_amendment',
        'date_of_termination',
        'set_alert_for_renewal',
        'branch',
        'contract_validity_till_no_of_years',
        'contract',
        'speech_therapy_cost',
        'occupational_therapy_cost',
        'behavioural_therapy_cost',
        'psychoeducational_assessment_cost',
        'physiotherapy_cost',
    ];

    public function cost_of_therapy_in_school(): HasMany
    {
        return $this->hasMany(CostOfTherapyInSchool::class, "mou_moa_id", "id");
    }

    public function cost_of_therapy_in_clinic(): HasMany
    {
        return $this->hasMany(CostOfTherapyInClinic::class, "mou_moa_id", "id");
    }
}
