<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffConfidentialityContract extends Model
{
    protected $table = "staff_confidentiality_contracts";

    protected $fillable = [
        'user_id',
        'phone_no_id',
        'phone_no_dubai_id',
        'emergency_phone_no_id',
        'permanent_address_id',
        'temporary_address_id',
        'references_id',
        'effective_date',
        'license',
        'first_party_user_id',
        'first_party_user_position',
        'first_party_user_signature',
        'first_party_user_emergency_phone_no_id',
        'second_party_name',
        'second_party_passport_no',
        'second_party_current_address',
        'second_party_date',
        'second_party_signature',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function firstpartyuser(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function phoneno(): BelongsTo
    {
        return $this->belongsTo(PhoneNo::class, "phone_no_id", "id");
    }

    public function phonenodubai(): BelongsTo
    {
        return $this->belongsTo(PhoneNo::class, "phone_no_dubai_id", "id");
    }

    public function emergencyphoneno(): BelongsTo
    {
        return $this->belongsTo(PhoneNo::class, "emergency_phone_no_id", "id");
    }

    public function firstpartyphoneno(): BelongsTo
    {
        return $this->belongsTo(PhoneNo::class, "phone_no_id", "id");
    }

    public function permanentaddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, "permanent_address_id", "id");
    }

    public function temporaryaddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, "temporary_address_id", "id");
    }

    public function references(): BelongsTo
    {
        return $this->belongsTo(Reference::class, "references_id", "id");
    }
}
