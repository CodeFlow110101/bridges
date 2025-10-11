<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiTarget1 extends Model
{
    protected $table = "kpi_target_1";

    protected $fillable = [
        'key_performance_indicators_id',
        'attendance_reporting_time',
        'rapport_with_administration_desk',
        'report_writing_skills',
        'maintaining_body_checklist',
        'property_premise_care',
    ];
}
