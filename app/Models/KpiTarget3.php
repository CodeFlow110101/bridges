<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiTarget3 extends Model
{
    protected $table = "kpi_target_3";

    protected $fillable = [
        'key_performance_indicators_id',
        'communication_skills',
        'decision_making',
        'initiation',
        'consistent_performance',
        'grooming_presentation_skills',
        'teamwork',
    ];
}
