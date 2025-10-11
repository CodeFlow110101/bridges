<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiTarget2 extends Model
{
    protected $table = "kpi_target_2";

    protected $fillable = [
        'key_performance_indicators_id',
        'planning_of_session',
        'supporting_fellow_therapist',
        'creativity_customization_as_per_client',
        'clean_and_organized_station',
        'problem_solving',
        'counselling',
    ];
}
