<?php

namespace App\Filament\Resources\MOMS\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MOMInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('session_date')
                    ->date(),
                TextEntry::make('date_of_mom')
                    ->date(),
                TextEntry::make('meeting_date')
                    ->date(),
                TextEntry::make('date_of_email_sent')
                    ->date(),
                TextEntry::make('email_from'),
                TextEntry::make('email_to'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
