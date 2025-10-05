<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    protected $table = "medical_records";
    protected $fillable = ["user_id", "file", "expiry", "type_id"];

    public function type(): BelongsTo
    {
        return $this->belongsTo(MedicalRecordType::class, "type_id", "id");
    }
}
