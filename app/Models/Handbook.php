<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Handbook extends Model
{
    protected $table = "handbooks";

    protected $fillable = [
        'user_id',
        'probation',
        'hours_of_work_1',
        'hours_of_work_2',
        'first_party_user_id',
        'first_party_position',
        'contact_details_id',
        'first_party_signature',
        'second_party_name',
        'second_party_passport_number',
        'second_party_current_address',
        'second_party_date',
        'second_party_signature',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function firstPartyUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "first_party_user_id", "id");
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(PhoneNo::class, "contact_details_id", "id");
    }
}
