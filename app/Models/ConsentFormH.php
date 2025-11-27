<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormH extends Model
{
    protected $table = "consent_form_h";

    protected $fillable = [
        'signature',
        'date_and_time',
        'name',
        'date_of_birth',
        'parent_name',
        'address',
        'phone_no',
        'email',
        'therapist_name',
        'therapist_signature',
        'witness_signature',
    ];
}
