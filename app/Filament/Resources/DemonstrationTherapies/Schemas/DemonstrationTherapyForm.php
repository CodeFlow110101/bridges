<?php

namespace App\Filament\Resources\DemonstrationTherapies\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DemonstrationTherapyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inquiry_number')
                    ->required(),
                DatePicker::make('session_date')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->required(),
                TextInput::make('mother_msl'),
                TextInput::make('father_msl'),
                TextInput::make('caregiver_msl'),
                TextInput::make('whom_msl'),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
            ]);
    }
}
