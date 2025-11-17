<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TherapyRoomCleanliness extends Model
{
    protected $table = "therapy_room_cleanliness";

    protected $fillable = ["name", "signature", "date"];
}
