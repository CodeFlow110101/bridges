<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    static function getTarget1Columns()
    {
        return collect([
            'attendance_reporting_time',
            'rapport_with_administration_desk',
            'report_writing_skills',
            'maintaining_body_checklist',
            'property_premise_care',
        ]);
    }

    static function getTarget2Columns()
    {
        return collect([
            'planning_of_session',
            'supporting_fellow_therapist',
            'creativity_customization_as_per_client',
            'clean_and_organized_station',
            'problem_solving',
            'counselling',
        ]);
    }

    static function getTarget3Columns()
    {
        return collect([
            'communication_skills',
            'decision_making',
            'initiation',
            'consistent_performance',
            'grooming_presentation_skills',
            'teamwork',
        ]);
    }

    public function getScoreAttribute()
    {
        return collect([
            $this->target1Score,
            $this->target2Score,
            $this->target3Score,
        ])->sum();
    }

    public function getTarget1ScoreAttribute()
    {
        return collect($this->target1->only(self::getTarget1Columns()->all()))->sum();
    }

    public function getTarget2ScoreAttribute()
    {
        return collect($this->target2->only(self::getTarget2Columns()->all()))->sum();
    }

    public function getTarget3ScoreAttribute()
    {
        return collect($this->target3->only(self::getTarget3Columns()->all()))->sum();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

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
