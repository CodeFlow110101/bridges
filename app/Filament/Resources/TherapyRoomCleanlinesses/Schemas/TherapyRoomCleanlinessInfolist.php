<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TherapyRoomCleanlinessInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
