<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AppoinmentReportReminderForm
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
                Section::make("For Assesment")
                    ->schema([
                        TextInput::make('client_name')
                            ->required(),
                        DateTimePicker::make('date_and_time')->native(false),
                        TextInput::make('phone_no_dubai')
                            ->mask('99999999')
                            ->label("Current Phone (in Dubai)")
                            ->tel(),
                        Radio::make('phase')
                            ->inline()
                            ->default(0)
                            ->options([
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                            ]),
                    ])->columnSpanFull(),
                Section::make("For Intervention")
                    ->schema([
                        TextInput::make('pattern'),
                        TextInput::make('client_name_intervention'),
                    ])->columnSpanFull(),
                Section::make("Option A")
                    ->schema([
                        DateTimePicker::make('option_a_date_time')->native(false),
                        TextInput::make('option_a_phone_no_dubai')
                            ->tel(),
                    ])->columnSpanFull(),
                Section::make("Option B")
                    ->schema([
                        TextInput::make('option_b_multiple_days_intervention')
                            ->numeric(),
                        DateTimePicker::make('option_b_therapist_date_time')->native(false),
                        TextInput::make('option_b_time_session_booked')
                            ->numeric(),
                        TextInput::make('option_b_department')
                            ->numeric(),
                    ])->columnSpanFull(),
                Section::make("Option C")
                    ->schema([
                        DatePicker::make('option_c_date')->native(false),
                        Repeater::make('optionc')
                            ->table([
                                TableColumn::make('Start Time'),
                                TableColumn::make('End Time'),
                                TableColumn::make('Therapist Name 1'),
                                TableColumn::make('Therapist Name 2'),
                                TableColumn::make('Therapist Name 3'),
                                TableColumn::make('Therapist Name 4'),
                                TableColumn::make('Therapist Name 5'),
                                TableColumn::make('Therapist Name 6'),
                                TableColumn::make('Therapist Name 7'),
                                TableColumn::make('Therapist Name 8'),
                                TableColumn::make('Therapist Name 9'),
                                TableColumn::make('Therapist Name 10'),
                            ])
                            ->relationship("optionc")
                            ->label("Option C")
                            ->schema([
                                TimePicker::make('start_time')->native(false),
                                TimePicker::make('end_time')->native(false),
                                Toggle::make('therapist_name_1'),
                                Toggle::make('therapist_name_2'),
                                Toggle::make('therapist_name_3'),
                                Toggle::make('therapist_name_4'),
                                Toggle::make('therapist_name_5'),
                                Toggle::make('therapist_name_6'),
                                Toggle::make('therapist_name_7'),
                                Toggle::make('therapist_name_8'),
                                Toggle::make('therapist_name_9'),
                                Toggle::make('therapist_name_10'),
                            ])->extraAttributes(["class" => "overflow-x-auto px-0.5 pb-4"])
                    ])->columnSpanFull(),
                Section::make("Option D")->schema([
                    Repeater::make('optiond')
                        ->table([
                            TableColumn::make('Start Time'),
                            TableColumn::make('End Time'),

                            TableColumn::make('Monday'),
                            TableColumn::make('Tuesday'),
                            TableColumn::make('Wednesday'),
                            TableColumn::make('Thursday'),
                            TableColumn::make('Friday'),
                            TableColumn::make('Saturday'),
                        ])
                        ->relationship("optiond")
                        ->label("Option ")
                        ->schema([
                            TimePicker::make('start_time')->native(false),
                            TimePicker::make('end_time')->native(false),

                            Toggle::make('monday'),
                            Toggle::make('tuesday'),
                            Toggle::make('wednesday'),
                            Toggle::make('thursday'),
                            Toggle::make('friday'),
                            Toggle::make('saturday'),
                        ])
                        ->extraAttributes(["class" => "overflow-x-auto px-0.5 pb-4"])
                ])->columnSpanFull(),
                Section::make()
                    ->schema([
                        Radio::make('consent_to')
                            ->label("Consent to Assess/ Counsel/ Enrol")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('consent_to_insurance_name'),
                    ])->columnSpanFull(),
                Section::make("Form A")
                    ->schema([
                        Radio::make('form_a_consent_to_school')
                            ->label("Consent to send report to school")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_a_consent_to_school_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form B")
                    ->schema([
                        Radio::make('form_b_consent_to_electronic_transfer')
                            ->label("Consent for electronic transfer")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_b_consent_to_electronic_transfer_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form C")
                    ->schema([
                        Radio::make('form_c_consent_to_social_media')
                            ->label("Consent for Social Media")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_c_consent_to_social_media_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form E")
                    ->schema([
                        Radio::make('form_e_allow_kid_to_dispatch')
                            ->label("Allowing kid to be dispatched with someone other than parent")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_e_allow_kid_to_dispatch_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form F")
                    ->schema([
                        Radio::make('form_f_consent_to_group')
                            ->label("Consent for group Therapy/group camp/readiness")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_f_consent_to_group_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form D")
                    ->schema([
                        Radio::make('form_d_consent_to_medicine')
                            ->label("Consent for Medicine administration")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_d_consent_to_medicine_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Consent for Intervention: Form H")
                    ->schema([
                        Radio::make('form_h_consent_to_enrolment')
                            ->label("Consent to Intervention enrolment")
                            ->inline()
                            ->options([
                                'Yes',
                                'No',
                                'Name of the Insurance'
                            ]),
                        TextInput::make('form_h_consent_to_enrolment_insurance_name')->label("Insurance Name"),
                    ])->columnSpanFull(),
                Section::make("Form G")->schema([
                    Repeater::make('formg')
                        ->table([
                            TableColumn::make('Client Name'),
                            TableColumn::make('Form A'),
                            TableColumn::make('Form B'),
                            TableColumn::make('Form C'),
                            TableColumn::make('Form D'),
                            TableColumn::make('Form E'),
                            TableColumn::make('Form F'),
                            TableColumn::make('Form G'),
                            TableColumn::make('Form H'),
                        ])
                        ->relationship("formg") // change to your actual relationship name
                        ->label("Form G")
                        ->schema([
                            TextInput::make('client_name'),
                            Toggle::make('form_a'),
                            Toggle::make('form_b'),
                            Toggle::make('form_c'),
                            Toggle::make('form_d'),
                            Toggle::make('form_e'),
                            Toggle::make('form_f'),
                            Toggle::make('form_g'),
                            Toggle::make('form_h'),
                        ])
                        ->extraAttributes(["class" => "overflow-x-auto px-0.5 pb-4"])
                ])->columnSpanFull(),
            ]);
    }
}
