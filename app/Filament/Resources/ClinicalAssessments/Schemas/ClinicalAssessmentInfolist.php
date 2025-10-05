<?php

namespace App\Filament\Resources\ClinicalAssessments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClinicalAssessmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('assess_name'),
                TextEntry::make('referral_source'),
                TextEntry::make('discussed'),
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
