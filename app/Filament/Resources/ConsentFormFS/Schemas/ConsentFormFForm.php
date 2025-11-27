<?php

namespace App\Filament\Resources\ConsentFormFS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormFForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('child_name'),
                DatePicker::make('date_of_birth')->native(false),
                TextInput::make('phone_no')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Text::make('I, ……………………………………, the parent/guardian of ………………………………………….., hereby authorize the following individual to collect my child from Bridges Speech Center LLC:')
                    ->size(TextSize::Large),
                TextInput::make('authorized_person_name'),
                TextInput::make('authorized_person_phone_no')
                    ->tel(),
                TextInput::make('authorized_person_relationship'),
                TextInput::make('authorized_person_email')
                    ->email(),
                Textarea::make('authorized_person_id')
                    ->columnSpanFull(),
                Text::make('In order to ensure the safety and well-being of my child, I understand that the authorized person must comply with the following requirements:')
                    ->size(TextSize::Large),

                Text::make('- Submit a recent photograph of themselves.')
                    ->size(TextSize::Large),

                Text::make('- Provide a valid photo identification proof (e.g., driver\'s license, passport, government-issued ID).')
                    ->size(TextSize::Large),

                Text::make('I acknowledge that by granting this consent, I am allowing the authorized person to collect my child on my behalf from Bridges Speech Center LLC.')
                    ->size(TextSize::Large),

                Text::make('I understand that the staff from the center will verify the authorized person\'s identity and compare it to the provided photograph and photo ID proof.')
                    ->size(TextSize::Large),

                Text::make('I agree that the center and its staff members will not be held liable for any issues or incidents that may occur during the authorized person\'s collection of my child, provided they have complied with the identification verification process as described above.')
                    ->size(TextSize::Large),

                Text::make('By signing below, I confirm that I have read and understood the contents of this consent form, and I willingly authorize the authorized person mentioned above to collect my child from Bridges Speech Center LLC.')
                    ->size(TextSize::Large),

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
                TextInput::make('relation'),
                DatePicker::make('date')->native(false),
            ])->columns(1);
    }
}
