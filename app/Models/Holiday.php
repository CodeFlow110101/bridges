<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = "holidays";
    protected $fillable = [
        'inquiry_number',
        'holiday_name',
        'date_of_birth',
        'mother_msl',
        'father_msl',
        'caregiver_msl',
        'whom_msl',
        'caregiver_name',
        'other_infomration',
    ];
}
