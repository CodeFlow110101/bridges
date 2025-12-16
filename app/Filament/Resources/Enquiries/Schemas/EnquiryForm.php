<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use App\Models\Enquiry;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;

class EnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inquiry_number')->hiddenOn("create")->readOnly()->label('Inquiry Number'),
                DatePicker::make('date')->hiddenOn("create")->readOnly(),
                TextInput::make('name')->required(),
                TextInput::make('phone_no')
                    ->required()
                    ->label("Phone No (In Dubai)")
                    ->rule('digits:9')
                    ->mask("999999999")
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('school'),
                Radio::make('is_insurance_covered')
                    ->inline()
                    ->live()
                    ->default(0)
                    ->options([
                        0 => 'Yes',
                        1 => 'No',
                        2 => 'Unaware',
                    ]),
                TextInput::make('insurance_name')
                    ->hidden(fn(Get $get) => $get('is_insurance_covered') != 0)
                    ->columnSpanFull()
                    ->label('Insurance Name'),
                Radio::make('referral_source')
                    ->required()
                    ->options(Enquiry::referralSourceOptions())->live()->inline()->columnSpanFull(),
                TextInput::make('referral_source_name')
                    ->columnSpanFull()
                    ->hidden(fn(Get $get) => is_null($get('referral_source'))),
                Select::make('inquired_service')
                    ->label("Inquired Services by Client")
                    ->columnSpanFull()
                    ->options(Enquiry::enquiredServices())->native(false),
                TextInput::make('other_service')->columnSpanFull(),
                Section::make([
                    Toggle::make('has_taken_intervention_before')
                        ->required()->live(),
                    Textarea::make('intervention_details')
                        ->hidden(fn(Get $get) => !$get('has_taken_intervention_before'))
                        ->columnSpanFull(),
                ])->columnSpanFull(),
                Section::make([
                    Toggle::make('is_assessment_required')
                        ->required()
                        ->live(),
                    Textarea::make('assessment_details')
                        ->columnSpanFull()
                        ->hidden(fn(Get $get) => !$get('is_assessment_required')),
                ])->columnSpanFull(),

                Section::make("Details discussed with the client")
                    ->schema([
                        TextInput::make('cost_of_service')->label("Cost of service per session")->mask('99999999')->required(),
                        Toggle::make('is_report_provided')
                            ->label("I Have mentioned that: In consultation, report is not provided. If required consultant will suggest going for assessment")
                            ->inline(false)
                            ->required(),
                        Textarea::make('other_info')
                            ->required()
                            ->label("Other Information")
                            ->columnSpanFull(),
                        Toggle::make('is_client_satisfied')
                            ->label("Is Client satisfied with information provided?")
                            ->inline(false)
                            ->required(),
                    ])->columnSpanFull(),
                Section::make("Referral of enquiry to Supervisor/HOD/Clinic manager or relevant Individual")
                    ->schema([
                        DatePicker::make('date_of_enquiry_answered')->native(false),
                        Textarea::make('description_of_response')
                            ->label("Description of response recieved from the client as well as who has attended")
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
                Section::make("Has Client booked an appoinment")
                    ->schema([
                        Toggle::make('is_appoinment_booked')
                            ->required()
                            ->live(),
                        DateTimePicker::make('appoinment_date_and_time')->native(false)->hidden(fn(Get $get): bool => !$get('is_appoinment_booked'))->requiredIfAccepted('is_appoinment_booked'),
                        TextInput::make('supervisor_name')->hidden(fn(Get $get): bool => !$get('is_appoinment_booked'))->requiredIfAccepted('is_appoinment_booked'),
                        Textarea::make('details_when_appoinment_not_booked')
                            ->hidden(fn(Get $get): bool => $get('is_appoinment_booked'))
                            ->requiredIf('is_appoinment_booked', false)
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
                Section::make("Has Client attended Session?")
                    ->schema([
                        Toggle::make('has_scheduled_session')
                            ->required()
                            ->live(),
                        DateTimePicker::make('session_date_and_time')->native(false)->hidden(fn(Get $get): bool => !$get('has_scheduled_session')),
                        TextInput::make('session_supervisor_name')->hidden(fn(Get $get): bool => !$get('has_scheduled_session')),
                        Textarea::make('details_when_session_not_scheduled')
                            ->hidden(fn(Get $get): bool => $get('has_scheduled_session'))
                            ->requiredIf('has_scheduled_session', false)
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
            ]);
    }
}
