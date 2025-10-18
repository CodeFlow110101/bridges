<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = "references";

    protected $fillable = ["user_id", "text"];
}
