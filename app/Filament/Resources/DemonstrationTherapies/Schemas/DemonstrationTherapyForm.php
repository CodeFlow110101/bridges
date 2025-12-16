<?php

namespace App\Filament\Resources\DemonstrationTherapies\Schemas;

use App\Models\DemonstrationTherapy;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;

class DemonstrationTherapyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('inquiry_id')
                    ->label("Inquiry Number")
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpanFull()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number'),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('session_date')->native(false)
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->required()->native(false),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
                DatePicker::make('date')->native(false),
                Text::make("1. Features of caregiver(During Intervention procedure)")->size(TextSize::Large)->columnSpanFull(),
                Section::make("Msl")
                    ->schema([
                        Radio::make('mother_msl')
                            ->inline()
                            ->options(DemonstrationTherapy::mslOptions()),
                        Radio::make('father_msl')
                            ->inline()
                            ->options(DemonstrationTherapy::mslOptions()),
                        Radio::make('caregiver_msl')
                            ->inline()
                            ->options(DemonstrationTherapy::mslOptions()),
                        Radio::make('whom_msl')
                            ->inline()
                            ->options(DemonstrationTherapy::mslOptions()),
                    ])->columnSpanFull(),
                Textarea::make('other_information')
                    ->columnSpanFull(),
                Textarea::make('approach_used')
                    ->columnSpanFull(),
                Textarea::make('concern_of_patient')
                    ->columnSpanFull(),
                Text::make("Intervention records")->size(TextSize::Large),
                FileUpload::make('information_from_parent')
                    ->label("Information received through parent/caregiver on client’s preference")
                    ->directory('files')
                    ->columnSpanFull(),
                Textarea::make('client_observations')
                    ->label("Client observation: Preferences, concerns noted, associated issues")
                    ->columnSpanFull(),
                Textarea::make('supervisor_to_be_aware_of')
                    ->label("Information parallel therapist and supervisor to be aware of")
                    ->columnSpanFull(),
                FileUpload::make('session_report')
                    ->label("Demonstration session report")
                    ->directory('files')
                    ->columnSpanFull(),
            ]);
    }
}
