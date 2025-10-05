<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemonstrationTherapy extends Model
{
    protected $table = "demonstration_therapies";
    protected $fillable = [
        'inquiry_number',
        'session_date',
        'name',
        'date_of_birth',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_infomration',
    ];
}
