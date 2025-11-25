<?php

namespace App\Filament\Resources\ConsentFormBS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsentFormBInfolist
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
                TextEntry::make('school_name'),
                TextEntry::make('school_email'),
                TextEntry::make('school_phone_no'),
                TextEntry::make('parent_name'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
