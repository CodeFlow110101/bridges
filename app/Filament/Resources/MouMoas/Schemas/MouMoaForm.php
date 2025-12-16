<?php

namespace App\Filament\Resources\MouMoas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class MouMoaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('second_party_name')
                    ->required(),
                TextInput::make('second_party_location'),
                DatePicker::make('date_of_amendment')->native(false),
                DatePicker::make('date_of_termination')->native(false),
                TextInput::make('set_alert_for_renewal'),
                TextInput::make('branch'),
                TextInput::make('contract_validity_till_no_of_years'),
                FileUpload::make('contract')->directory('files')->columnSpanFull(),
                Section::make('Cost and Time duration')
                    ->description('Cost of assessment as per amendment')
                    ->schema([
                        TextInput::make('speech_therapy_cost')
                            ->mask('99999999'),
                        TextInput::make('occupational_therapy_cost')
                            ->mask('99999999'),
                        TextInput::make('behavioural_therapy_cost')
                            ->mask('99999999'),
                        TextInput::make('psychoeducational_assessment_cost')
                            ->mask('99999999'),
                        TextInput::make('physiotherapy_cost')
                            ->mask('99999999'),
                    ])->columnSpanFull(),
                Repeater::make('cost_of_therapy_in_clinic')
                    ->label("Cost of Therapy as per amendment (in Clinic)")
                    ->relationship()
                    ->table([
                        TableColumn::make('Location'),
                        TableColumn::make('Cost'),
                        TableColumn::make('Time'),
                    ])
                    ->default(fn() => [
                        [
                            "location" => "Speech Therapy",
                        ],
                        [
                            "location" => "Occupational Therapy",
                        ],
                        [
                            "location" => "Behavioural Therapy",
                        ],
                        [
                            "location" => "Psychoeducational Assessment",
                        ],
                        [
                            "location" => "Physiotherapy",
                        ],
                    ])
                    ->schema([
                        TextInput::make('location')
                            ->readOnly(),
                        TextInput::make('cost')
                            ->mask('99999999'),
                        TimePicker::make('time')
                            ->native(false)
                            ->prefixIconColor('success'),
                    ])
                    ->addable(false)
                    ->orderColumn(false)
                    ->deletable(false)
                    ->columnSpanFull(),
                Repeater::make('cost_of_therapy_in_school')
                    ->label("Cost of Therapy as per amendment (in School)")
                    ->relationship()
                    ->table([
                        TableColumn::make('Location'),
                        TableColumn::make('Cost'),
                        TableColumn::make('Time'),
                    ])
                    ->default(fn() => [
                        [
                            "location" => "Speech Therapy",
                        ],
                        [
                            "location" => "Occupational Therapy",
                        ],
                        [
                            "location" => "Behavioural Therapy",
                        ],
                        [
                            "location" => "Psychoeducational Assessment",
                        ],
                        [
                            "location" => "Physiotherapy",
                        ],
                    ])
                    ->schema([
                        TextInput::make('location')
                            ->readOnly(),
                        TextInput::make('cost')
                            ->mask('99999999'),
                        TimePicker::make('time')
                            ->native(false)
                            ->prefixIconColor('success'),
                    ])
                    ->addable(false)
                    ->orderColumn(false)
                    ->deletable(false)
                    ->columnSpanFull()
            ]);
    }
}
