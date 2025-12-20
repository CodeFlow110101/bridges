<?php

namespace App\Filament\Resources\ClientInterventions\Schemas;

use App\Models\ClientIntervention;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClientInterventionForm
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
                DatePicker::make('date_of_birth')->native(false),
                Section::make("Msl")
                    ->schema([
                        Radio::make('mother_msl')
                            ->inline()
                            ->options(ClientIntervention::mslOptions()),
                        Radio::make('father_msl')
                            ->inline()
                            ->options(ClientIntervention::mslOptions()),
                        Radio::make('caregiver_msl')
                            ->inline()
                            ->options(ClientIntervention::mslOptions()),
                        Radio::make('whom_msl')
                            ->inline()
                            ->options(ClientIntervention::mslOptions()),
                    ])->columnSpanFull(),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
                Textarea::make('approach_used')
                    ->columnSpanFull(),
                Textarea::make('concern_of_patient')
                    ->columnSpanFull(),
                FileUpload::make('information_from_parent')->directory('files')
                    ->columnSpanFull(),
                Textarea::make('client_observations')
                    ->columnSpanFull(),
                Textarea::make('supervisor_to_be_aware_of')
                    ->columnSpanFull(),
            ]);
    }
}
