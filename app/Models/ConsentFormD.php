<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormD extends Model
{
    protected $table = "consent_form_d";

    protected $fillable = [
        'name',
        'age',
        'gender',
        'signature',
        'parent_signature',
        'parent_name',
        'date_and_time',
        'therapist_name',
        'therapist_signature',
        'witness_name',
        'witness_signature',
    ];
}
