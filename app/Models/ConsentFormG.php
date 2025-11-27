<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormG extends Model
{
    protected $table = "consent_form_g";

    protected $fillable = [
        'location_of_recording',
        'date_and_time_of_signing',
        'name',
        'age',
        'gender',
        'signature',
        'parent_signature',
        'parent_name',
        'therapist_name',
        'therapist_signature',
        'witness_name',
        'witness_signature',
    ];
}
