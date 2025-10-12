<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EndService extends Model
{
    protected $table = "end_services";
    protected $fillable = ["user_id"];

    public function responses(): HasMany
    {
        return $this->hasMany(EndServiceResponse::class, "end_service_id", "id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
