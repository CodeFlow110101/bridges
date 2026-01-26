<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StaffEnrollmentTraining extends Model
{
    protected $table = "staff_enrollment_training";

    protected $fillable = [
        'user_id',
        'highest_qualification',
        'department_id',
        'supervisor',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, "department_id", "id");
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(StaffEnrollmentTrainingProjectStatus::class, "training_id", "id");
    }
}
