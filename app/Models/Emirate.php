<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emirate extends Model
{
    protected $table = "emirates";

    protected $fillable = ['user_id', 'file', 'expiry'];
}
