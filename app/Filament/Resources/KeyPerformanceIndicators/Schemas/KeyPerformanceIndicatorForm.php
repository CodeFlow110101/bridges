<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Schemas;

use App\Models\KeyPerformanceIndicator;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Illuminate\Support\HtmlString;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\UnorderedList;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Placeholder;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class KeyPerformanceIndicatorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})"),
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
                                    ->schema(KeyPerformanceIndicator::getTarget1Columns()->map(fn($column) => TextInput::make($column)->mask('99')->default(0)->live(debounce: 200)
                                        ->partiallyRenderComponentsAfterStateUpdated(['administration_total'])
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $set("administration_total", KeyPerformanceIndicator::getTarget1Columns()->map(fn($col) => $get($col))->sum());
                                            $set('../../overall_total', collect([
                                                "target1",
                                                "target2",
                                                "target3",
                                            ])->map(function ($field) use ($get) {
                                                return collect(collect($get("../../" . $field))->first())->last();
                                            })->sum());
                                        }))
                                        ->push(TextInput::make('administration_total')->formatStateUsing(fn($livewire) => $livewire->record?->target1Score)->disabled())
                                        ->all())
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
                                    ->label(fn() => new HtmlString("<div></div>"))
                                    ->addActionLabel('Add')
                                    ->schema(KeyPerformanceIndicator::getTarget2Columns()->map(fn($column) => TextInput::make($column)->mask('99')->default(0)->live(debounce: 200)
                                        ->partiallyRenderComponentsAfterStateUpdated(['planning_total'])
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $set("planning_total", KeyPerformanceIndicator::getTarget2Columns()->map(fn($col) => $get($col))->sum());
                                            $set('../../overall_total', collect([
                                                "target1",
                                                "target2",
                                                "target3",
                                            ])->map(function ($field) use ($get) {
                                                return collect(collect($get("../../" . $field))->first())->last();
                                            })->sum());
                                        }))
                                        ->push(TextInput::make('planning_total')->formatStateUsing(fn($livewire) => $livewire->record?->target2Score)->disabled())
                                        ->all())
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
                                    ->label(fn() => new HtmlString("<div></div>"))
                                    ->addActionLabel('Add')
                                    ->schema(KeyPerformanceIndicator::getTarget3Columns()->map(fn($column) => TextInput::make($column)->mask('99')->default(0)->live(debounce: 200)
                                        ->partiallyRenderComponentsAfterStateUpdated(['performance_total'])
                                        ->afterStateUpdated(function ($state, Get $get, Set $set, $livewire) {
                                            $set("performance_total", KeyPerformanceIndicator::getTarget3Columns()->map(fn($col) => $get($col))->sum());
                                            $set('../../overall_total', collect([
                                                "target1",
                                                "target2",
                                                "target3",
                                            ])->map(function ($field) use ($get) {
                                                return collect(collect($get("../../" . $field))->first())->last();
                                            })->sum());
                                        }))
                                        ->push(TextInput::make('performance_total')->formatStateUsing(fn($livewire) => $livewire->record?->target3Score)->disabled())
                                        ->all())
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
                TextInput::make("overall_total")->label("SCORE(Sum of A+B+C)")->disabled(),
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
                            fn($column) => SignaturePad::make($column)
                                ->dotSize(2.0)
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
            ])->columns(1);
    }
}
