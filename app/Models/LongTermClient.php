<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LongTermClient extends Model
{
    protected $table = "long_term_clients";

    protected $fillable = [
        'enquiry_number',
        'client_name',
        'client_letter_of_discount',
        'reply_from_clinical_manager',
        'email_recieved_from_parent_date',
        'date_when_email_replied',
        'email_date_from_forwarded',
        'email_address_forwarded_through',
        'conditions_discovered',
        'cheque_no',
        'cost_on_cheque',
        'contract_no_of_months',
        'alert_to_generate_on',
    ];
}
