<?php

namespace App\Filament\Resources\ClinicalAssessments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClinicalAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inquiry_number')->required(),
                TextInput::make('assess_name')->required(),
                TextInput::make('referral_source'),
                TextInput::make('discussed'),
                TextInput::make('mother_msl'),
                TextInput::make('father_msl'),
                TextInput::make('caregiver_msl'),
                TextInput::make('whom_msl'),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
            ]);
    }
}
