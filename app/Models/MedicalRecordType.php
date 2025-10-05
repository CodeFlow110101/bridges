<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecordType extends Model
{
    protected $table = "medical_record_types";
    protected $fillable = ["name"];
}
