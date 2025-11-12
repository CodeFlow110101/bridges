<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvoiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('date_and_time')
                    ->date(),
                TextEntry::make('client_name'),
                TextEntry::make('client_id'),
                TextEntry::make('invoice_number'),
                TextEntry::make('department_id')
                    ->numeric(),
                TextEntry::make('no_of_sessions'),
                TextEntry::make('service')
                    ->numeric(),
                TextEntry::make('amount'),
                TextEntry::make('method')
                    ->numeric(),
                TextEntry::make('validity_of_period_for_amount_paid'),
                TextEntry::make('cheque_no'),
                TextEntry::make('cheque_date')
                    ->date(),
                TextEntry::make('bank_transaction_no'),
                TextEntry::make('skiply'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
