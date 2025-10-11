<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpiStrengthAndSkill extends Model
{
    protected $table = "kpi_strength_and_skills";

    protected $fillable = ["key_performance_indicators_id", "text"];
}
