<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisputeManagement extends Model
{
    protected $table = "dispute_management";

    protected $fillable = [
        'user_id',
        'date',
        'concern',
        'email_to_forward',
        'addressed_date',
        'response_date',
        'responded_by',
        'conclusion',
    ];
}
