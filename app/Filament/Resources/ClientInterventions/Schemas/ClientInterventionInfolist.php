<?php

namespace App\Filament\Resources\ClientInterventions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInterventionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('mother_msl'),
                TextEntry::make('father_msl'),
                TextEntry::make('caregiver_msl'),
                TextEntry::make('whom_msl'),
                TextEntry::make('caregiver_name'),
                TextEntry::make('other_infomration'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
