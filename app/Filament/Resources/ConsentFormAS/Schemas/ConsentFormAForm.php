<?php

namespace App\Filament\Resources\ConsentFormAS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormAForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('I ………………………………………………. authorize The Bridges Speech Centre LLC, acting through its therapist to take photograph, video recordings and or audio recordings of me /my ward including my name, my image, my performance and or my voice recordings.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I hereby give a right to use my video recording, audio recording, and photo for sole purpose of my therapy. I am aware that this recordings / CCTV footage will not be used for the purpose of marketing, display, publicity, or promotion. All communication with parents will be done using the official Bridges phone number.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('The videos will be shared between the attending therapist, the ABA supervisor, and parents.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('The therapist has explained to me in detail about the provisional diagnosis and treatment plan. I am aware of the procedure and my involvement in the therapeutic intervention.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I acknowledge that I am not expecting to receive compensation for participating in the recording or any future use of the recordings of me /my ward.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I have read this entire Consent and Release form. I fully understand it and I agree to be bound by it. I represent and certify that my age is at least 18 yrs old, or, if I am under 18 years old on this date, my parent or legal guardian has also signed below.')
                    ->columnSpanFull()->size(TextSize::Large),
                Textarea::make('location_of_recording')
                    ->columnSpanFull(),
                DatePicker::make('date_and_time_of_signing')->native(false),
                TextInput::make('name'),
                TextInput::make('age'),
                TextInput::make('gender'),
                SignaturePad::make('signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                Textarea::make('parent_signature')
                    ->columnSpanFull(),
                TextInput::make('parent_name'),
                TextInput::make('therapist_name'),
                SignaturePad::make('therapist_signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                TextInput::make('witness_name'),
                SignaturePad::make('witness_signature')->dotSize(2.0)
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
