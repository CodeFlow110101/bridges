<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
