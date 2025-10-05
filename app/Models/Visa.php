<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $table = "visas";
    protected $fillable = ["user_id", "file", "expiry"];
}
