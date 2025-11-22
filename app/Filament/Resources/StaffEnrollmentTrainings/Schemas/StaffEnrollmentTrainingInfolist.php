<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StaffEnrollmentTrainingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('employee_name'),
                TextEntry::make('highest_qualification'),
                TextEntry::make('department')
                    ->numeric(),
                TextEntry::make('supervisor'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
