<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppoinmentReportReminderFormG extends Model
{
    protected $table = "appoinment_report_reminder_form_g";

    protected $fillable = [
        'appoinment_report_reminder_id',
        'client_name',
        'form_a',
        'form_b',
        'form_c',
        'form_d',
        'form_e',
        'form_f',
        'form_g',
        'form_h',
    ];
}
