<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNo extends Model
{
    protected $table = "phone_nos";
    protected $fillable = ["user_id", "phone_no"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
