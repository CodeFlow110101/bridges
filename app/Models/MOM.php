<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MOM extends Model
{

    protected $table = "moms";

    protected $fillable = [
        'inquiry_id',
        'date_of_birth',
        'session_date',
        'date_of_mom',
        'things_to_be_followed_by_supervisor',
        'things_to_be_followed_by_parent',
        'file',
        'meeting_date',
        'date_of_email_sent',
        'email_from',
        'email_to',
    ];

    public function enquiry(): BelongsTo
    {
        return $this->belongsTo(Enquiry::class, "inquiry_id", "id");
    }
}
