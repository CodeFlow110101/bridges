<?php

namespace App\Filament\Resources\DemonstrationTherapies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DemonstrationTherapyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('session_date')
                    ->date(),
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('caregiver_name'),
                TextEntry::make('other_infomration'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('mother_msl')
                    ->numeric(),
                TextEntry::make('father_msl')
                    ->numeric(),
                TextEntry::make('caregiver_msl')
                    ->numeric(),
                TextEntry::make('whom_msl')
                    ->numeric(),
            ]);
    }
}
