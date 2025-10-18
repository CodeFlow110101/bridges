<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EndServiceResponse extends Model
{
    protected $table = "end_service_responses";
    protected $fillable = ["end_service_id", "question_id", "text", "is_complete"];

    public function question(): BelongsTo
    {
        return $this->belongsTo(EndServiceQuestion::class, "question_id", "id");
    }
}
