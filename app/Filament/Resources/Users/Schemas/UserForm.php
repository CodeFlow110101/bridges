<?php

namespace App\Filament\Resources\Users\Schemas;

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

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('staff_id')->required(),
                DatePicker::make('date_of_birth')->native(false)->maxDate(now()->subYears(18))->default(now()->subYears(18))->required(),
                Select::make('department_id')->relationship('department', 'name')->required()->native(false),
                TextInput::make('password')->password()->revealable()->hiddenOn('edit'),
                Section::make('Passport Details')
                    ->schema([
                        DatePicker::make('passport_expiry')->native(false)->requiredWith('passport_file'),
                        FileUpload::make('passport_file')->directory('files')->requiredWith('passport_expiry'),
                    ])->columnSpanFull(),
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Phone Numbers')
                            ->schema([
                                Repeater::make('phonenos')
                                    ->label("Phone Numbers")
                                    ->relationship()
                                    ->simple(
                                        TextInput::make('phone_no')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ),
                            ]),
                        Tab::make('Addresses')
                            ->schema([
                                Repeater::make('addresses')
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
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry'),
                                    ])
                            ]),
                        Tab::make('Experience Letters')
                            ->schema([
                                Repeater::make('experienceletters')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry'),
                                    ])
                            ]),
                        Tab::make('Licences')
                            ->schema([
                                Repeater::make('licences')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry'),
                                    ])
                            ]),
                        Tab::make('Medical Records')
                            ->schema([
                                Repeater::make('medicalRecords')
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make('expiry')->native(false)->requiredWith('file'),
                                        FileUpload::make('file')->directory('files')->requiredWith('expiry'),
                                        Select::make('type_id')->relationship('type', 'name')->requiredWith(['expiry', 'file'])->native(false),
                                    ])
                            ]),
                    ])->columnSpanFull()
            ]);
    }
}
