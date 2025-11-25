<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormC extends Model
{
    protected $table = "consent_form_c";

    protected $fillable = [
        'name',
        'date_of_birth',
        'phone_no',
        'email',
        'signature',
        'date',
        'organization_name',
        'organization_phone_no',
        'organization_address',
        'organization_email',
        'parent_signature',
        'witness_signature',
    ];
}
