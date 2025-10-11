<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KeyPerformanceIndicator extends Model
{
    protected $table = "key_performance_indicators";

    protected $fillable = [
        'user_id',
        'date',
        'evaluation_period',
        'quarter_1',
        'quarter_2',
        'quarter_3',
        'quarter_4',
        'quarter_5',
        'rating',
        'performance_score',
        'employee_signature',
        'hod_supervisor_signature',
        'hrs_signature',
        'directors_signature',
        'hod_supervisor_2nd_signature',
    ];

    public function kpiStrengthAndSkill(): HasMany
    {
        return $this->hasMany(KpiStrengthAndSkill::class, "key_performance_indicators_id", "id");
    }

    public function target1(): HasOne
    {
        return $this->hasOne(KpiTarget1::class, "key_performance_indicators_id", "id");
    }

    public function target2(): HasOne
    {
        return $this->hasOne(KpiTarget2::class, "key_performance_indicators_id", "id");
    }

    public function target3(): HasOne
    {
        return $this->hasOne(KpiTarget3::class, "key_performance_indicators_id", "id");
    }
}
