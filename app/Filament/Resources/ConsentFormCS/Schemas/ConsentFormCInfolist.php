<?php

namespace App\Filament\Resources\ConsentFormCS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsentFormCInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('phone_no'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('organization_name'),
                TextEntry::make('organization_phone_no'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
