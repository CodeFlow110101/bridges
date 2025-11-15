<?php

namespace App\Filament\Resources\EmployeeSalaries\Schemas;

use App\Models\EmployeeSalary;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeSalaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id})")
                    ->searchable()
                    ->preload(),
                Select::make('company_name')
                    ->options(EmployeeSalary::companies())
                    ->native(false)
                    ->required(),
                TextInput::make('designation'),
                DatePicker::make('joining_date')
                    ->required()->native(false),
                TextInput::make('emergency_contact_details'),
                DatePicker::make('pay_period')->native(false),
                Section::make("Employee Salary Details")
                    ->schema([
                        TextInput::make('basic_salary'),
                        TextInput::make('hra'),
                        TextInput::make('other_allowances'),
                    ])->columnSpanFull(),
                Section::make("Deductions")
                    ->schema([
                        Textarea::make('loss_of_pay')
                            ->columnSpanFull(),
                        TextInput::make('loss_of_pay_amount'),
                        TextInput::make('total_earnings'),
                        TextInput::make('total_advance_taken'),
                        TextInput::make('total_advance_balance'),
                        Textarea::make('advance_deductions')
                            ->columnSpanFull(),
                        Textarea::make('other_deductions')
                            ->columnSpanFull(),
                        Textarea::make('total_deductions')
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
                TextInput::make('final_salary')->columnSpanFull(),
            ]);
    }
}
