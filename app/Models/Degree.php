<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = "degrees";

    protected $fillable = ["user_id", "file", "expiry"];
}
