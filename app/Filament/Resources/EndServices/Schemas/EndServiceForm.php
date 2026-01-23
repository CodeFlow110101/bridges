<?php

namespace App\Filament\Resources\EndServices\Schemas;

use App\Models\EndServiceQuestion;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class EndServiceForm
{
    public static function configure(Schema $schema): Schema
    {

        $questions = EndServiceQuestion::get();

        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name}")
                    ->native(false)->columnSpanFull()->disabled(fn(string $operation): bool => $operation === 'edit'),
                Section::make('Procedure')
                    ->schema([
                        Repeater::make("procedure")->relationship("responses", fn($query) => $query->whereHas("question", fn($query) => $query->where("type_id", 1)))
                            ->schema([
                                DatePicker::make("text")->native(false)->label(fn($get) => $get("question"))->requiredIfAccepted('is_complete')->validationAttribute('question')->disabled(fn(Get $get): bool => !$get('is_complete')),
                                Radio::make('is_complete')
                                    ->label("Complete/ Incomplete")
                                    ->boolean(trueLabel: 'Complete', falseLabel: 'Incomplete')
                                    ->inline()
                                    ->live()
                            ])->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>"))->mutateRelationshipDataBeforeFillUsing(function (array $data) use ($questions): array {
                                return collect($data)->put("question", $questions->where("id", collect($data)->get("question_id"))->first()->text)->all();
                            })
                    ])
                    ->collapsible(),
                Section::make('Recitals')
                    ->schema([
                        Repeater::make("Recitals")->relationship("responses", fn($query) => $query->whereHas("question", fn($query) => $query->where("type_id", 2)))
                            ->schema([
                                TextInput::make("text")->label(fn($get) => $get("question"))
                            ])->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>"))->mutateRelationshipDataBeforeFillUsing(function (array $data) use ($questions): array {
                                return collect($data)->put("question", $questions->where("id", collect($data)->get("question_id"))->first()->text)->all();
                            })
                    ])
                    ->collapsible(),
            ]);
    }
}
