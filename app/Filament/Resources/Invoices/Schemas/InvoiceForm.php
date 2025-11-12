<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('date_and_time')
                    ->native(false)
                    ->required(),
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('client_id')
                    ->required(),
                TextInput::make('invoice_number'),
                Select::make('department_id')
                    ->required()
                    ->relationship(name: 'department', titleAttribute: 'name')->native(false),
                Textarea::make('other')
                    ->columnSpanFull(),
                TextInput::make('no_of_sessions'),
                Select::make('service')
                    ->native(false)
                    ->options(["none"]),
                TextInput::make('amount'),
                Select::make('method')
                    ->native(false)
                    ->options(["none"]),
                TextInput::make('validity_of_period_for_amount_paid'),
                TextInput::make('cheque_no'),
                DatePicker::make('cheque_date')->native(false),
                TextInput::make('bank_transaction_no'),
                TextInput::make('skiply'),
                Textarea::make('comment')
                    ->columnSpanFull(),
            ]);
    }
}
