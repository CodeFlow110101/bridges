<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostOfTherapyInClinic extends Model
{
    protected $table = "cost_of_therapy_in_clinic";

    protected $fillable = [
        'mou_moa_id',
        'location',
        'cost',
        'time',
    ];
}
