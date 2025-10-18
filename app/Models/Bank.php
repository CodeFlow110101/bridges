<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "bank_account_details";

    protected $fillable = ["user_id", "text"];
}
