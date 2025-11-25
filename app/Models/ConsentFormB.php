<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormB extends Model
{
    protected $table = "consent_form_b";

    protected $fillable = [
        'name',
        'date_of_birth',
        'phone_no',
        'email',
        'school_name',
        'school_email',
        'school_phone_no',
        'parent_name',
        'parent_signature',
        'date',
        'signature',
    ];
}
