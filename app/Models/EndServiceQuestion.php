<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EndServiceQuestion extends Model
{
    protected $table = "end_service_questions";
    protected $fillable = ["type_id", "text"];

    public function type(): BelongsTo
    {
        return $this->belongsTo(EndServiceQuestionType::class, "type_id", "id");
    }

    public function responses(): HasMany
    {
        return $this->hasMany(EndServiceResponse::class, "question_id", "id");
    }
}
