<?php

namespace App\Filament\Resources\Interventions\Schemas;

use App\Models\Intervention;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class InterventionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inquiry_number')
                    ->required(),
                DatePicker::make('date')
                    ->native(false)
                    ->required(),
                TextInput::make('name')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('referral_source')
                    ->columnSpanFull(),
                Textarea::make('details_discussed')
                    ->columnSpanFull(),

                Section::make("Features of caregiver")
                    ->schema([

                        Section::make("Parent: Mother (MSL)")->schema([
                            Radio::make('mother_msl_1')
                                ->label(new HtmlString("<div></div>"))
                                ->inline()
                                ->options(Intervention::mslOptions1()),
                            Radio::make('mother_msl_2')
                                ->inline()
                                ->label(new HtmlString("<div></div>"))
                                ->options(Intervention::mslOptions2()),
                        ])->columnSpanFull(),
                        Section::make("Parent: Father (MSL)")->schema([
                            Radio::make('father_msl_1')
                                ->label(new HtmlString("<div></div>"))
                                ->inline()
                                ->options(Intervention::mslOptions1()),
                            Radio::make('father_msl_2')
                                ->inline()
                                ->label(new HtmlString("<div></div>"))
                                ->options(Intervention::mslOptions2()),
                        ])->columnSpanFull(),
                        Section::make("Caregiver (MSL)")->schema([
                            Radio::make('caregiver_msl_1')
                                ->label(new HtmlString("<div></div>"))
                                ->inline()
                                ->options(Intervention::mslOptions1()),
                            Radio::make('caregiver_msl_2')
                                ->inline()
                                ->label(new HtmlString("<div></div>"))
                                ->options(Intervention::mslOptions2()),
                        ])->columnSpanFull(),
                        Radio::make('communicate_to')
                            ->inline()
                            ->label("Whom communicate to: (MSL)")
                            ->options(Intervention::whomToCommunicateOptions())->columnSpanFull(),
                        TextInput::make('caregiver_name')->columnSpanFull(),
                        Textarea::make('caregiver_relationship')
                            ->columnSpanFull(),
                        Textarea::make('caregiver_other_info')
                            ->columnSpanFull(),
                        Toggle::make('has_caregiver_relevant_info')
                            ->label("Has relevant information given to the therapist /consultant (who will be handling client)? *")
                            ->required()
                            ->live()
                            ->default(false),
                        Textarea::make('caregiver_relevant_info')
                            ->columnSpanFull()->hidden(fn(Get $get): bool => !$get('has_caregiver_relevant_info')),

                        Toggle::make('is_first_therapy')
                            ->label("Has client attended first therapy session? ")
                            ->required()
                            ->default(false)
                            ->live(),
                        Radio::make('if_not_first_therapy')
                            ->inline()
                            ->label(new HtmlString("<div></div>"))
                            ->options(Intervention::notFirstTherapyOptions())->columnSpanFull()
                            ->hidden(fn(Get $get): bool => !$get('is_first_therapy'))
                            ->live(),
                        Textarea::make('if_not_other_first_therapy_description')
                            ->columnSpanFull()
                            ->label(new HtmlString("<div></div>"))
                            ->hidden(fn(Get $get): bool => !($get('is_first_therapy') && $get('if_not_first_therapy') == 3)),
                    ]),
                Section::make("Payment option suggested")->schema([
                    Radio::make('has_insurance_coverage')
                        ->default(0)
                        ->inline()->label("Does client have Insurance coverage? ")
                        ->options(Intervention::hasInsuranceCoverageOptions())->columnSpanFull()->live(),
                    TextInput::make('insurance_name')->label("Which Insurance?")->hidden(fn(Get $get): bool => $get('has_insurance_coverage') != 0),
                    Textarea::make('insurance_services_covered')->label("Which Services are covered?")->hidden(fn(Get $get): bool => $get('has_insurance_coverage') != 0)
                        ->columnSpanFull(),
                    Textarea::make('cost_services')
                        ->label("If no, cost Mentioned for services* (Add all the details of services including conditions mentioned to the client) ")
                        ->columnSpanFull()
                        ->hidden(fn(Get $get): bool => $get('has_insurance_coverage') != 1),
                    FileUpload::make('cost_services_file')->directory('files')
                        ->columnSpanFull()
                        ->hidden(fn(Get $get): bool => $get('has_insurance_coverage') != 1),
                ]),
                Section::make("Therapy Enrolment")
                    ->schema([
                        TextInput::make('therapist_name'),
                        TextInput::make('supervisor_name'),
                        Toggle::make('is_schedule')
                            ->label("Schedule therapy plan submission date*?")
                            ->required()
                            ->live(),
                        DateTimePicker::make('schedule_date_time')->native(false)->hidden(fn(Get $get): bool => !$get('is_schedule')),
                        TextInput::make('schedule_supervisor_name')->hidden(fn(Get $get): bool => !$get('is_schedule')),
                    ])
            ])->columns(1);
    }
}
