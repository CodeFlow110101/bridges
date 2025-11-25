<?php

namespace App\Filament\Resources\ConsentFormAS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsentFormAInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('date_and_time_of_signing')
                    ->date(),
                TextEntry::make('name'),
                TextEntry::make('age'),
                TextEntry::make('gender'),
                TextEntry::make('parent_name'),
                TextEntry::make('therapist_name'),
                TextEntry::make('witness_name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
