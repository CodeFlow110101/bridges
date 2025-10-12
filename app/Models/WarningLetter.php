<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WarningLetter extends Model
{
    protected $table = "warning_letters";

    protected $fillable = [
        'user_id',
        'date_of_issue',
        'brief_description_of_the_issue_concern',
        'describe_any_relevant_background_information',
        'explain_the_effects_or_consequences_of_the_problem',
        'should_be_completed_by_deadline',
        'email_address_to_respond_to',
        'date_when_address_appropriately',
        'response',
        'responded_by',
        'conclusion',
        'any_document',
    ];

    public function actions(): HasMany
    {
        return $this->hasMany(WarningLetterAction::class, "warning_letter_id", "id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
