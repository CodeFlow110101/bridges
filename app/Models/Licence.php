<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    protected $table = "licences";
    protected $fillable = ["user_id", "file", "expiry"];
}
