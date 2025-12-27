<?php

namespace App\Filament\Resources\WarningLetters\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class WarningLetterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->live()
                    ->columnSpanFull()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})")
                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set) {
                        $user = User::find($state);
                        $set('name', $user?->full_name);
                    }),
                DatePicker::make("date_of_issue")->native(false)->required(),
                Section::make("Questions")->schema([
                    Textarea::make('brief_description_of_the_issue_concern'),
                    Textarea::make('describe_any_relevant_background_information')->label("describe any relevant background information or events leading up to the problem"),
                    Textarea::make('explain_the_effects_or_consequences_of_the_problem'),
                    DatePicker::make("should_be_completed_by_deadline")->native(false),
                ]),
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
            ])->columns(1);
    }
}
