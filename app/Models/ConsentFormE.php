<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsentFormE extends Model
{
    protected $table = "consent_form_e";

    protected $fillable = [
        'parent_name',
        'date',
        'signature',
    ];
}
