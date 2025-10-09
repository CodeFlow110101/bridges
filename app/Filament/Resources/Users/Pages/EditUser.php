<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\EndService;
use App\Models\EndServiceQuestion;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\Width;
use Illuminate\Support\HtmlString;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            Action::make('Create End Services')->fillForm(function (User $record) {
                $questions = EndServiceQuestion::get()->map(fn($record) => collect($record)->put("response", ""));
                return ["procedure" => $questions->where("type_id", 1), "recitals" => $questions->where("type_id", 2)];
            })->schema([
                Grid::make()->columns(2)->schema([
                    Section::make('Procedure')
                        ->schema([
                            Repeater::make("procedure")->schema([
                                DatePicker::make("response")->native(false)->label(fn($get) => $get('text'))
                            ])->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>"))
                        ])
                        ->collapsible()->collapsed(true),
                    Section::make('Recitals')
                        ->schema([
                            Repeater::make("recitals")->schema([
                                TextInput::make("response")->label(fn($get) => $get('text'))
                            ])->deletable(false)->reorderable(false)->addable(false)->label(fn() => new HtmlString("<div></div>"))
                        ])
                        ->collapsible()->collapsed(true)
                ])
            ])->action(function (array $data, User $record, $action): void {;
                $endService = $record->endservices()->create([]);
                $endService->responses()->createMany(collect($data["procedure"])->select(["id", "response"])->map(fn($record) => ["question_id" => $record["id"], "text" => $record["response"]]));
                $endService->responses()->createMany(collect($data["recitals"])->select(["id", "response"])->map(fn($record) => ["question_id" => $record["id"], "text" => $record["response"]]));
                $this->redirect(UserResource::getUrl('edit', ['record' => $record]), navigate: true);
            })->stickyModalHeader()->stickyModalFooter()->modalWidth(Width::SevenExtraLarge)
        ];
    }
}
