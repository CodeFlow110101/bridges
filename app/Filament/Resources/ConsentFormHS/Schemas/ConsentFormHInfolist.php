<?php

namespace App\Filament\Resources\ConsentFormHS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsentFormHInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('date_and_time')
                    ->date(),
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('parent_name'),
                TextEntry::make('phone_no'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('therapist_name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
