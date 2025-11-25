<?php

namespace App\Filament\Resources\ConsentFormBS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Size;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormBForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                DateTimePicker::make('date_of_birth')->native(false),
                TextInput::make('phone_no')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('school_name'),
                TextInput::make('school_email')
                    ->email(),
                Text::make('I , ………………………………….. parent/guardian of …………………hereby grant permission for Bridges Speech Center to release / communicate with [Child\'s Name] - ……………………… school/nursery regarding therapy details, strategies, reports, and collaborative planning for child’s development.')
                    ->columnSpanFull()->size(TextSize::Large),
                TextInput::make('school_phone_no')
                    ->tel(),
                TextInput::make('parent_name'),
                SignaturePad::make('parent_signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                DatePicker::make('date')->native(false),
                SignaturePad::make('signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
            ])->columns(1);
    }
}
