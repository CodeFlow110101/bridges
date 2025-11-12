<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $table = "invoices";

    protected $fillable = [
        'date_and_time',
        'client_name',
        'client_id',
        'invoice_number',
        'department_id',
        'other',
        'no_of_sessions',
        'service',
        'amount',
        'method',
        'validity_of_period_for_amount_paid',
        'cheque_no',
        'cheque_date',
        'bank_transaction_no',
        'skiply',
        'comment',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, "department_id", "id");
    }
}
