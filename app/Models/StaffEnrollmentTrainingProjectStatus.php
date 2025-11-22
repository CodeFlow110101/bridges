<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffEnrollmentTrainingProjectStatus extends Model
{
    protected $table = 'staff_enrollment_training_project_statuses';

    protected $fillable = [
        'training_id',
        'project',
        'status',
        'date_of_completion',
    ];
}
