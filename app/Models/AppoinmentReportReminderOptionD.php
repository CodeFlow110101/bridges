<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppoinmentReportReminderOptionD extends Model
{
    protected $table = "appoinment_report_reminder_option_d";

    protected $fillable = [
        'appoinment_report_reminder_id',
        'start_time',
        'end_time',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];
}
