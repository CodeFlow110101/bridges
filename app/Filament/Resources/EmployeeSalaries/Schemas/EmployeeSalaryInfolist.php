<?php

namespace App\Filament\Resources\EmployeeSalaries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EmployeeSalaryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('company_name')
                    ->numeric(),
                TextEntry::make('designation'),
                TextEntry::make('joining_date')
                    ->date(),
                TextEntry::make('emergency_contact_details'),
                TextEntry::make('pay_period')
                    ->date(),
                TextEntry::make('basic_salary'),
                TextEntry::make('hra'),
                TextEntry::make('other_allowances'),
                TextEntry::make('loss_of_pay_amount'),
                TextEntry::make('total_earnings'),
                TextEntry::make('total_advance_taken'),
                TextEntry::make('total_advance_balance'),
                TextEntry::make('final_salary'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
