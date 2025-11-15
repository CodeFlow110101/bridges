<?php

namespace App\Filament\Resources\StaffConfidentialityContracts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StaffConfidentialityContractInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('phone_no_id')
                    ->numeric(),
                TextEntry::make('phone_no_dubai_id')
                    ->numeric(),
                TextEntry::make('emergency_phone_no_id')
                    ->numeric(),
                TextEntry::make('permanent_address_id')
                    ->numeric(),
                TextEntry::make('temporary_address_id')
                    ->numeric(),
                TextEntry::make('references_id')
                    ->numeric(),
                TextEntry::make('effective_date')
                    ->date(),
                TextEntry::make('license'),
                TextEntry::make('first_party_user_id')
                    ->numeric(),
                TextEntry::make('first_party_user_position'),
                TextEntry::make('first_party_user_emergency_phone_no_id')
                    ->numeric(),
                TextEntry::make('second_party_name'),
                TextEntry::make('second_party_passport_no'),
                TextEntry::make('second_party_date')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
