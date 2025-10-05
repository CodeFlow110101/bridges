<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceLetter extends Model
{
    protected $table = "experience_letters";
    protected $fillable = ["user_id", "file", "expiry"];
}
