<?php

namespace App\Filament\Resources\ConsentFormDS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormDForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('1.  I ………………………………………………. Do/ Don’t authorize The Bridges Speech Centre LLC, acting through its therapist to take photograph, video recordings and or audio recordings of me /my ward including my name, my image, my performance and or my voice recordings.')
                    ->size(TextSize::Large),

                Text::make('• I hereby give a right to use my video recording, audio recording and photo for sole purpose of my therapy.')
                    ->size(TextSize::Large),

                Text::make('• I am aware that these recording / CCTV footages will not be used for purpose of marketing, display and publicity or promotion.')
                    ->size(TextSize::Large),

                Text::make('• I acknowledge that I am not expecting to receive compensation for participating in the recording or any future use of the recordings of me /my ward.')
                    ->size(TextSize::Large),

                Text::make('Guardian signature: ______________ Clinic Manager signature: _____________')
                    ->size(TextSize::Large),

                // ------------------------- 2 -------------------------

                Text::make('2. Therapist has explained to me in detail about the provisional diagnosis and treatment plan. I am aware about the procedure and my involvement in the therapeutic intervention.')
                    ->size(TextSize::Large),

                Text::make('Guardian signature: ________ Clinic Manager/HOD:______________________')
                    ->size(TextSize::Large),

                // ------------------------- 3 -------------------------

                Text::make('3. I am aware by the Bridges speech center / Head of the department that my child will be taken in a group setting to improve his social skills and develop an adaptability to noisy environment.')
                    ->size(TextSize::Large),

                Text::make('Guardian signature: __________ Clinic Manager/ HOD:______________________')
                    ->size(TextSize::Large),

                // ------------------------- Final -------------------------

                Text::make('I have read this entire Consent and Release form. I fully understand it and I agree to be bound by it. I represent and certify that my age is at least 18 yrs old, or, if I am under 18 years old on this date, my parent or legal guardian has also signed below.')
                    ->size(TextSize::Large),

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
                SignaturePad::make('parent_signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                TextInput::make('parent_name'),
                DateTimePicker::make('date_and_time')->native(false),
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
