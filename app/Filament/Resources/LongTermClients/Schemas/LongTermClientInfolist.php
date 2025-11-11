<?php

namespace App\Filament\Resources\LongTermClients\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LongTermClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('enquiry_number'),
                TextEntry::make('client_name'),
                TextEntry::make('email_recieved_from_parent_date')
                    ->date(),
                TextEntry::make('date_when_email_replied')
                    ->date(),
                TextEntry::make('email_date_from_forwarded')
                    ->date(),
                TextEntry::make('cheque_no'),
                TextEntry::make('cost_on_cheque'),
                TextEntry::make('contract_no_of_months'),
                TextEntry::make('alert_to_generate_on'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
