<?php

namespace App\Filament\Resources\EndServices\Pages;

use App\Filament\Resources\EndServices\EndServiceResource;
use App\Filament\Resources\Users\UserResource;
use App\Models\EndServiceQuestion;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Support\Enums\Width;
use Illuminate\Support\HtmlString;

class ListEndServices extends ListRecords
{
    protected static string $resource = EndServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Create End Services')->fillForm(function () {
                $questions = EndServiceQuestion::get()->map(fn($record) => collect($record)->put("response", "")->put("is_complete", false));
                return ["procedure" => $questions->where("type_id", 1), "recitals" => $questions->where("type_id", 2)];
            })->schema([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name}"),
                Grid::make()->columns(1)->schema([
                    Section::make('Procedure')
                        ->schema([
                            Repeater::make("procedure")->schema([
                                DatePicker::make("response")->native(false)->label(fn($get) => $get('text'))->requiredIfAccepted('is_complete')->validationAttribute('question')->disabled(fn(Get $get): bool => !$get('is_complete')),
                                Radio::make('is_complete')
                                    ->label("Complete/ Incomplete")
                                    ->boolean(trueLabel: 'Complete!')
                                    ->boolean(falseLabel: 'Incomplete')
                                    ->inline()
                                    ->live()
                            ])->columns(2)->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>")),
                        ])
                        ->collapsible()->collapsed(true),
                    Section::make('Recitals')
                        ->schema([
                            Repeater::make("recitals")->schema([
                                TextInput::make("response")->label(fn($get) => $get('text'))->required(),
                            ])->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>"))
                        ])
                        ->collapsible()->collapsed(true)
                ])
            ])->action(function (array $data, $action): void {
                $record = User::find($data["user_id"]);
                $endService = $record->endservices()->create([]);
                $endService->responses()->createMany(collect($data["procedure"])->select(["id", "response", "is_complete"])->map(fn($record) => collect($record))->map(fn($record) => ["question_id" => $record->get("id"), "text" => $record->get("response"), "is_complete" => $record->get('is_complete')]));
                $endService->responses()->createMany(collect($data["recitals"])->select(["id", "response", "is_complete"])->map(fn($record) => collect($record))->map(fn($record) => ["question_id" => $record->get("id"), "text" => $record->get("response"), "is_complete" => $record->get('is_complete')]));
                $this->redirect(EndServiceResource::getUrl('index'), navigate: true);
            })->stickyModalHeader()->stickyModalFooter()->modalWidth(Width::SevenExtraLarge)
        ];
    }

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
