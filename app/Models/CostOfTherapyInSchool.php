<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostOfTherapyInSchool extends Model
{
    protected $table = "cost_of_therapy_in_school";

    protected $fillable = [
        'mou_moa_id',
        'location',
        'cost',
        'time',
    ];
}
