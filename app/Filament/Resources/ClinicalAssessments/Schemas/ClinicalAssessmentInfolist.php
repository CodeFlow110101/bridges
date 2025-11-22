<?php

namespace App\Filament\Resources\ClinicalAssessments\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClinicalAssessmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('name'),
                TextEntry::make('referral_source'),
                TextEntry::make('caregiver_name'),
                TextEntry::make('other_infomration'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('therapy_enrollment'),
                TextEntry::make('supervisors_name'),
                IconEntry::make('is_document_provided')
                    ->boolean(),
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
