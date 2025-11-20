<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppoinmentReportReminderOptionC extends Model
{

    protected $table = "appoinment_report_reminder_option_c";

    protected $fillable = [
        'appoinment_report_reminder_id',
        'start_time',
        'end_time',
        'therapist_name_1',
        'therapist_name_2',
        'therapist_name_3',
        'therapist_name_4',
        'therapist_name_5',
        'therapist_name_6',
        'therapist_name_7',
        'therapist_name_8',
        'therapist_name_9',
        'therapist_name_10',
    ];
}
