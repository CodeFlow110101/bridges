<?php

namespace App\Filament\Resources\Holidays\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HolidayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inquiry_number')
                    ->required(),
                TextInput::make('holiday_name')
                    ->required(),
                DatePicker::make('date_of_birth'),
                TextInput::make('mother_msl'),
                TextInput::make('father_msl'),
                TextInput::make('caregiver_msl'),
                TextInput::make('whom_msl'),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
            ]);
    }
}
