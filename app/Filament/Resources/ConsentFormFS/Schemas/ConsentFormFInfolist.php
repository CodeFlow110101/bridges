<?php

namespace App\Filament\Resources\ConsentFormFS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsentFormFInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('child_name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('phone_no'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('authorized_person_name'),
                TextEntry::make('authorized_person_phone_no'),
                TextEntry::make('authorized_person_relationship'),
                TextEntry::make('authorized_person_email'),
                TextEntry::make('parent_name'),
                TextEntry::make('parent_signature'),
                TextEntry::make('relation'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
