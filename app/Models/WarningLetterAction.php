<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarningLetterAction extends Model
{
    protected $table = "warning_letter_actions";

    protected $fillable = [
        "warning_letter_id",
        "text"
    ];
}
