<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppoinmentReportReminderOptionCTherapist extends Model
{
    protected $table = "appoinment_report_reminder_option_c_therapists";

    protected $fillable = [
        'name',
        'option_c_id',
    ];
}
