<?php

namespace App\Filament\Resources\MOMS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;

class MOMForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('inquiry_id')
                    ->label("Inquiry Number")
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->columnSpanFull()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number'),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_of_birth')->native(false),
                DatePicker::make('session_date')->native(false),
                DatePicker::make('date_of_mom')->native(false),
                Text::make("Information therapist and supervisor to be aware of/ points discussed during meeting which needs to be implemented by supervisor /therapist:")
                    ->size(TextSize::Large)
                    ->columnSpanFull(),
                Textarea::make('things_to_be_followed_by_supervisor')
                    ->label("Things to follow during upcoming session by supervisor /therapist")
                    ->columnSpanFull(),
                Text::make("Information therapist and supervisor to be aware of/ points discussed during meeting which needs to be implemented by parent:")
                    ->size(TextSize::Large)
                    ->columnSpanFull(),
                Textarea::make('things_to_be_followed_by_parent')
                    ->label("Things to follow during upcoming sessions by parent")
                    ->columnSpanFull(),
                Text::make("MOM report")
                    ->size(TextSize::Large)
                    ->columnSpanFull(),
                FileUpload::make('file')->directory('files')
                    ->columnSpanFull(),
                DatePicker::make('meeting_date')->label("Date when meeting was conducted")->native(false),
                DatePicker::make('date_of_email_sent')->label("Date when email is done ")->native(false),
                TextInput::make('email_from')
                    ->label("Email addresses from where it was sent")
                    ->email(),
                TextInput::make('email_to')
                    ->label("Email addresses to where it was sent")
                    ->email(),
            ]);
    }
}
