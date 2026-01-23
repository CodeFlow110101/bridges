<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Forms\Components\Signature;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Radio;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;
use Filament\Schemas\Components\UnorderedList;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Support\HtmlString;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, Set $set, Get $get, $operation) {
                        if ($operation == "create") {
                            $set("staff_id", Str::of($state)->limit(2, "")->upper() . Str::of($get("last_name"))->limit(2, "")->upper() . collect()->times(4, fn() => rand(0, 9))->implode(''));
                        }
                    }),
                TextInput::make('last_name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, Set $set, Get $get, $operation) {
                        if ($operation == "create") {
                            $set("staff_id",   Str::of($get("first_name"))->limit(2, "")->upper() . Str::of($state)->limit(2, "")->upper() . collect()->times(4, fn() => rand(0, 9))->implode(''));
                        }
                    }),
                TextInput::make('staff_id')->required()->readOnly(),
                TextInput::make('email')->required(),
                DatePicker::make('date_of_birth')->native(false)->maxDate(now()->subYears(18))->default(now()->subYears(18))->required(),
                DatePicker::make("joining_date")->date('d M Y')->native(false),
                Select::make('department_id')->relationship('department', 'name')->required()->native(false),
                TextInput::make('basic_salary')->numeric()->nullable(),
                TextInput::make('hra')->numeric()->nullable(),
                TextInput::make('other_allowances')->numeric()->nullable(),
                TextInput::make('transportation')->numeric()->nullable(),
                TextInput::make('password')->password()->revealable()->hiddenOn('edit')->confirmed(),
                TextInput::make('password_confirmation')->password()->revealable()->hiddenOn('edit'),
                Section::make('India Contact Information')
                    ->schema([
                        TextInput::make('permanent_telephone_india')
                            ->label('Permanent Telephone (India)')
                            ->tel()
                            ->maxLength(20),

                        Textarea::make('permanent_address_india')
                            ->label('Permanent Address (India)')
                            ->rows(2),
                    ])
                    ->columns(2),

                Section::make('Relative in Dubai')
                    ->schema([
                        TextInput::make('relative_name_dubai')
                            ->label('Relative Name'),

                        TextInput::make('relative_contact_dubai')
                            ->label('Relative Contact')
                            ->tel()
                            ->maxLength(20),

                        Textarea::make('relative_address_dubai')
                            ->label('Relative Address')
                            ->rows(2),
                    ])
                    ->columns(2),

                Section::make('Friend in Dubai')
                    ->schema([
                        TextInput::make('friend_name_dubai')
                            ->label('Friend Name'),

                        TextInput::make('friend_contact_dubai')
                            ->label('Friend Contact')
                            ->tel()
                            ->maxLength(20),

                        Textarea::make('friend_address_dubai')
                            ->label('Friend Address')
                            ->rows(2),
                    ])
                    ->columns(2),

                Section::make('Medical Information')
                    ->schema([
                        Textarea::make('medical_concern')
                            ->label('Medical Concern / Ailment')
                            ->rows(2),

                        Textarea::make('medications')
                            ->label('Medicines Being Consumed')
                            ->rows(2),

                        TextInput::make('doctor_or_clinic')
                            ->label('Doctor / Clinic')
                            ->maxLength(255),
                    ]),
                Section::make('Day 1: Trainee will receive Induction program Sheet')
                    ->schema([
                        DatePicker::make("induction_program_sheet")->date('d M Y')->native(false),
                    ])->columnSpanFull(),
                Section::make('Introduction to Center Premises - direct')
                    ->schema(
                        [
                            TextInput::make("introduction_status")->label("Status"),
                            Grid::make()
                                ->schema(
                                    collect([
                                        'introduction_to_director',
                                        'introduction_to_supervisors',
                                        'introduction_to_pantry_area',
                                        'introduction_to_toy_room_work_area',
                                        'introduction_to_resource_room',
                                        'introduction_to_training_area',
                                    ])->map(fn($columns) => Checkbox::make($columns)->label(Str::of($columns)->chopStart('introduction_to_')->headline()))->all(),
                                )
                        ]
                    )->columnSpanFull(),
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Phone Numbers')
                            ->schema([
                                Repeater::make('phonenos')
                                    ->label("Phone Numbers")
                                    ->relationship()
                                    ->simple(
                                        TextInput::make('phone_no')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    )->defaultItems(0),
                            ]),
                        Tab::make('Passport')
                            ->schema([
                                TextInput::make("passport_number")->requiredWith('passport_file', 'passport_expiry'),
                                DatePicker::make('passport_expiry')->native(false)->requiredWith('passport_file', 'passport_number'),
                                FileUpload::make('passport_file')->directory('files')->requiredWith('passport_expiry', 'passport_number')->downloadable(),
                            ]),
                        Tab::make('Addresses')
                            ->schema([
                                Repeater::make('addresses')
                                    ->relationship()
                                    ->simple(
                                        Textarea::make('address'),
                                    )
                            ]),
                        Tab::make('Visas')
                            ->schema([
                                Repeater::make('visas')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Bank Account Details')
                            ->schema([
                                Repeater::make('banks')
                                    ->relationship()
                                    ->schema([
                                        Textarea::make("text")
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('References')
                            ->schema([
                                Repeater::make('references')
                                    ->relationship()
                                    ->schema([
                                        Textarea::make("text")
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Experience Letters')
                            ->schema([
                                Repeater::make('experienceletters')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Licences')
                            ->schema([
                                Repeater::make('licences')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Emirate ID')
                            ->schema([
                                Repeater::make('emirates')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Degree')
                            ->schema([
                                Repeater::make('degrees')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                    ])
                                    ->defaultItems(0)
                            ]),
                        Tab::make('Medical Records')
                            ->schema([
                                Repeater::make('medicalRecords')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry')->downloadable(),
                                        Select::make('type_id')->relationship('type', 'name')->requiredWith(['expiry', 'file'])->native(false),
                                    ])
                                    ->defaultItems(0)
                            ]),
                    ])->columnSpanFull()->persistTab()
            ]);
    }
}
