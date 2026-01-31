<?php

namespace App\Filament\Resources\Holidays\Schemas;

use App\Models\Holiday;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use App\Models\Enquiry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HolidayForm
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
                    ->live()
                    ->columnSpanFull()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number')
                    ->afterStateUpdated(function ($state, callable $set) {
                        $enquiry = Enquiry::find($state);
                        if ($enquiry) {
                            $set('name', $enquiry->name);
                        }
                    }),
                TextInput::make('name')
                ->disabled()
                    ->required(),
                DatePicker::make('date_of_birth')->native(false),
                Section::make("Msl")
                    ->schema([
                        Radio::make('mother_msl')
                            ->inline()
                            ->options(Holiday::mslOptions()),
                        Radio::make('father_msl')
                            ->inline()
                            ->options(Holiday::mslOptions()),
                        Radio::make('caregiver_msl')
                            ->inline()
                            ->options(Holiday::mslOptions()),
                        Radio::make('whom_msl')
                            ->label("Whom communicate to: (MSL)")
                            ->inline()
                            ->options(Holiday::mslOptions()),
                    ])->columnSpanFull(),
                TextInput::make('caregiver_name')->label("Caregiver’s Name and relationship (If any)"),
                Textarea::make('other_information')
                    ->columnSpanFull(),
                Textarea::make('approach_used')
                    ->columnSpanFull(),
                Textarea::make('concern_of_patient')
                ->label("Concerns of Parent")
                    ->columnSpanFull(),
                Textarea::make('information_from_parent')
                    ->columnSpanFull(),
                FileUpload::make('client_observations')->directory('files')
                    ->label("Client observation: Preferences, concerns noted, associated issues ")
                    ->columnSpanFull(),
                Textarea::make('supervisor_to_be_aware_of')
                    ->label("Information parallel therapist and supervisor to be aware of")
                    ->columnSpanFull(),
                FileUpload::make('cheat_sheet')->directory('files')
                    ->columnSpanFull(),
                DatePicker::make('date_of_upload')->native(false),
            ]);
    }
}
