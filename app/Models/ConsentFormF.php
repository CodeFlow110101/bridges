<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormF extends Model
{
    protected $table = "consent_form_f";

    protected $fillable = [
        'child_name',
        'date_of_birth',
        'phone_no',
        'email',
        'authorized_person_name',
        'authorized_person_phone_no',
        'authorized_person_relationship',
        'authorized_person_email',
        'authorized_person_id',
        'parent_name',
        'parent_signature',
        'relation',
        'date',
    ];
}
