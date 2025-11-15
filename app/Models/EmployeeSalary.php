<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeSalary extends Model
{
    protected $table = "employee_salaries";

    protected $fillable = [
        'user_id',
        'company_name',
        'designation',
        'joining_date',
        'emergency_contact_details',
        'pay_period',
        'basic_salary',
        'hra',
        'other_allowances',
        'loss_of_pay',
        'loss_of_pay_amount',
        'total_earnings',
        'total_advance_taken',
        'total_advance_balance',
        'advance_deductions',
        'other_deductions',
        'total_deductions',
        'final_salary',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public static function companies()
    {
        return  [
            "Bridges Speech Center",
            "Bridges Synergy Pro FZE"
        ];
    }
}
