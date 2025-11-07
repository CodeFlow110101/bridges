<?php

namespace App\Filament\Resources\Interventions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InterventionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('name'),
                TextEntry::make('mother_msl_1')
                    ->numeric(),
                TextEntry::make('mother_msl_2')
                    ->numeric(),
                TextEntry::make('father_msl_1')
                    ->numeric(),
                TextEntry::make('father_msl_2')
                    ->numeric(),
                TextEntry::make('caregiver_msl_1')
                    ->numeric(),
                TextEntry::make('caregiver_msl_2')
                    ->numeric(),
                TextEntry::make('communicate_to')
                    ->numeric(),
                TextEntry::make('caregiver_name'),
                IconEntry::make('has_caregiver_relevant_info')
                    ->boolean(),
                IconEntry::make('is_first_therapy')
                    ->boolean(),
                TextEntry::make('if_not_first_therapy')
                    ->numeric(),
                TextEntry::make('has_insurance_coverage')
                    ->numeric(),
                TextEntry::make('insurance_name'),
                TextEntry::make('therapist_name'),
                TextEntry::make('supervisor_name'),
                IconEntry::make('is_schedule')
                    ->boolean(),
                TextEntry::make('schedule_date_time')
                    ->date(),
                TextEntry::make('schedule_supervisor_name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
