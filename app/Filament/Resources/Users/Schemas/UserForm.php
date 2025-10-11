<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Forms\Components\Signature;
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
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Support\HtmlString;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

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
                        Tab::make('Warning Letters')
                            ->schema([
                                Repeater::make('warningletters')
                                    ->label("Warning Letters")
                                    ->relationship()
                                    ->schema([
                                        DatePicker::make("date_of_issue")->native(false)->required(),
                                        Textarea::make('brief_description_of_the_issue_concern'),
                                        Textarea::make('describe_any_relevant_background_information_or_events_leading_up_to_the_problem'),
                                        Textarea::make('explain_the_effects_or_consequences_of_the_problem'),
                                        DatePicker::make("should_be_completed_by_deadline")->native(false),
                                        TextInput::make("email_address_to_respond_to"),
                                        DatePicker::make("date_when_address_appropriately")->native(false),
                                        Textarea::make('response'),
                                        Repeater::make('actions')
                                            ->relationship()
                                            ->schema([
                                                Textarea::make('text')->required(),
                                            ]),
                                        TextInput::make("responded_by"),
                                        Textarea::make('conclusion'),
                                        FileUpload::make('any_document')->directory('files'),
                                    ])
                            ]),
                        Tab::make('Key Performance Indicators')
                            ->schema([
                                Repeater::make('kpis')->label("Key Performance Indicators")
                                    ->relationship()
                                    ->collapsible()
                                    ->collapsed(true)
                                    ->schema([
                                        DatePicker::make('date')->native(false)->required(),
                                        Radio::make('evaluation_period')
                                            ->required()
                                            ->options([
                                                '1st Q: Jan-May' => '1st Q: Jan-May',
                                                '2nd Q: June-Sept' => '2nd Q: June-Sept',
                                                '3rd Q: Oct-Dec' => '3rd Q: Oct-Dec',
                                            ])->inline(),
                                        Section::make('Quarter')
                                            ->schema([
                                                Textarea::make('quarter_1'),
                                                Textarea::make('quarter_2'),
                                                Textarea::make('quarter_3'),
                                                Textarea::make('quarter_4'),
                                                Textarea::make('quarter_5'),
                                            ])->columns(2),
                                        Section::make('Rating Scale')
                                            ->schema([
                                                Radio::make('rating')
                                                    ->required()
                                                    ->options([
                                                        'O' => 'O',
                                                        'BT' => 'BT',
                                                        'MT' => 'MT',
                                                        'LT' => 'LT',
                                                        'UN' => 'UN',
                                                    ])->inline(),
                                            ]),
                                        Section::make('Performance Targets')
                                            ->schema([
                                                Section::make('Target 1: Administration')
                                                    ->collapsible()
                                                    ->collapsed(true)
                                                    ->schema([
                                                        Repeater::make('target1')
                                                            ->relationship()
                                                            ->defaultItems(1)
                                                            ->maxItems(1)
                                                            ->deletable(false)
                                                            ->label(fn($get, $record) => new HtmlString("<div></div>"))
                                                            ->addActionLabel('Add')
                                                            ->schema(
                                                                collect([
                                                                    'attendance_reporting_time',
                                                                    'rapport_with_administration_desk',
                                                                    'report_writing_skills',
                                                                    'maintaining_body_checklist',
                                                                    'property_premise_care',
                                                                ])->map(fn($column) => TextInput::make($column)->mask('99')->default(0))->all()
                                                            )
                                                    ]),
                                                Section::make('Target 2: Planning and Organization')
                                                    ->collapsible()
                                                    ->collapsed(true)
                                                    ->schema([
                                                        Repeater::make('target2')
                                                            ->relationship()
                                                            ->defaultItems(1)
                                                            ->maxItems(1)
                                                            ->deletable(false)
                                                            ->label(fn($get, $record) => new HtmlString("<div></div>"))
                                                            ->addActionLabel('Add')
                                                            ->schema(
                                                                collect([
                                                                    'planning_of_session',
                                                                    'supporting_fellow_therapist',
                                                                    'creativity_customization_as_per_client',
                                                                    'clean_and_organized_station',
                                                                    'problem_solving',
                                                                    'counselling',
                                                                ])->map(fn($column) => TextInput::make($column)->mask('99')->default(0))->all()
                                                            )
                                                    ]),
                                                Section::make('Target 3: Performance and conduct')
                                                    ->collapsible()
                                                    ->collapsed(true)
                                                    ->schema([
                                                        Repeater::make('target3')
                                                            ->relationship()
                                                            ->defaultItems(1)
                                                            ->maxItems(1)
                                                            ->deletable(false)
                                                            ->label(fn($get, $record) => new HtmlString("<div></div>"))
                                                            ->addActionLabel('Add')
                                                            ->schema(
                                                                collect([
                                                                    'communication_skills',
                                                                    'decision_making',
                                                                    'initiation',
                                                                    'consistent_performance',
                                                                    'grooming_presentation_skills',
                                                                    'teamwork',
                                                                ])->map(fn($column) => TextInput::make($column)->mask('99')->default(0))->all()
                                                            )
                                                    ])
                                            ]),

                                        Section::make('Strength and Skills')
                                            ->schema([
                                                Repeater::make('kpiStrengthAndSkill')
                                                    ->relationship()
                                                    ->simple(Textarea::make('text')->required())
                                                    ->label(fn($get, $record) => new HtmlString("<div></div>"))
                                                    ->addActionLabel('Add Strength and Skills'),
                                            ]),
                                        Text::make('*Overall performance')->size(TextSize::Large),
                                        Text::make('SCORE: Sum of A+B+C 0'),
                                        Text::make('*Performance Scoring:')->size(TextSize::Large),
                                        UnorderedList::make([
                                            'O: Outstanding Performance - Conduct and performance consistently superior',
                                            'BT: Beyond Target - Conduct and performance beyond set targets',
                                            'MT: Meeting Target - Conduct and performance just meeting set targets',
                                            'LT: Below Target - Conduct and performance fail to meet set targets',
                                            'UN: Unsatisfactory - Conduct and performance consistently unsatisfactory',
                                        ])->extraAttributes([
                                            'class' => 'unordered-list-style',
                                        ]),
                                        Radio::make('performance_score')->label(fn($get, $record) => new HtmlString("<div></div>"))
                                            ->required()
                                            ->options([
                                                'O' => 'Above 80 (O)',
                                                'BT' => '80-70 (BT)',
                                                'MT' => '70-60 (MT)',
                                                'LT' => '60-50 (LT)',
                                                'UN' => '50- < 40 (UN)',
                                            ])->inline(),
                                        Grid::make()->schema(
                                            collect(["employee_signature", "hod_supervisor_signature", "hrs_signature", "directors_signature", "hod_supervisor_2nd_signature"])
                                                ->map(
                                                    fn($column) => SignaturePad::make($column)->dotSize(2.0)
                                                        ->lineMinWidth(0.5)
                                                        ->lineMaxWidth(2.5)
                                                        ->throttle(16)
                                                        ->minDistance(5)
                                                        ->velocityFilterWeight(0.7)
                                                        ->backgroundColor('rgba(255, 255, 255, 1)')
                                                        ->penColor('#000000')
                                                        ->penColorOnDark('#000000')
                                                )
                                                ->all()
                                        ),
                                    ]),
                            ]),
                        Tab::make('Dispute Management')
                            ->schema([
                                Repeater::make('disputes')
                                    ->label("Disputes")
                                    ->relationship()
                                    ->collapsible()
                                    ->collapsed(true)
                                    ->schema([
                                        DatePicker::make('date')->native(false)->required(),
                                        Textarea::make("concern"),
                                        Grid::make()->schema([
                                            TextInput::make("email_to_forward"),
                                            DatePicker::make('addressed_date')->native(false),
                                            DatePicker::make('response_date')->native(false),
                                            TextInput::make("responded_by"),
                                        ]),
                                        Textarea::make("conclusion"),
                                    ])
                            ]),
                    ])->columnSpanFull()->persistTab()
            ]);
    }
}
