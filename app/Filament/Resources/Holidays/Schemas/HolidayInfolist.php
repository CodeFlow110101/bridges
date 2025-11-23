<?php

namespace App\Filament\Resources\Holidays\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HolidayInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('caregiver_name'),
                TextEntry::make('other_infomration'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('date_of_upload')
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
