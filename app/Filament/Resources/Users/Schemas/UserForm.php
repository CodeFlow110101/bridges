<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\EndService;
use App\Models\EndServiceQuestion;
use App\Models\User;
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
use Filament\Actions\Action;
use Filament\Schemas\Components\Grid;
use Filament\Support\Enums\Width;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Livewire\Livewire;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('staff_id')->required(),
                TextInput::make('email')->required(),
                DatePicker::make('date_of_birth')->native(false)->maxDate(now()->subYears(18))->default(now()->subYears(18))->required(),
                Select::make('department_id')->relationship('department', 'name')->required()->native(false),
                TextInput::make('password')->password()->revealable()->hiddenOn('edit'),
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
                        Tab::make('Passport')
                            ->schema([
                                DatePicker::make('passport_expiry')->native(false)->requiredWith('passport_file'),
                                FileUpload::make('passport_file')->directory('files')->requiredWith('passport_expiry'),
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
                        Tab::make('End Services')
                            ->schema([
                                Repeater::make('endservices')
                                    ->relationship()
                                    ->schema([
                                        Grid::make()->schema([
                                            Repeater::make('Procedure')->label("Procedure")
                                                ->relationship('responses', fn($query) => $query->whereHas('question', fn($q) => $q->where('type_id', 1))->orderBy("id"))
                                                ->schema([
                                                    DatePicker::make("text")->native(false)->label(fn($get, $record) => $record->question?->text ?? 'No question')
                                                ])->deletable(false)->addable(false),
                                            Repeater::make('Recitals')->label("Recitals")
                                                ->relationship('responses', fn($query) => $query->whereHas('question', fn($q) => $q->where('type_id', 2))->orderBy("id"))
                                                ->schema([
                                                    TextInput::make("text")->label(fn($get, $record) => $record->question?->text ?? 'No question')
                                                ])->deletable(false)->addable(false)
                                        ])
                                    ])->addable(false)->collapsible()->collapsed(true),
                            ])->hiddenOn('create'),
                    ])->columnSpanFull()->persistTab()
            ]);
    }
}
