<?php

namespace App\Filament\Resources\ConsentFormCS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormCForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('I, ……………………………….., the parent/guardian of …………………………………….., hereby writing to provide my consent for the electronic transmission of my medical report through email. As a client at Bridges Speech Center LLC, I understand that my medical report contains sensitive and confidential information regarding my/my ward’s health and medical history.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I hereby authorize Bridges Speech Center LLC to send a copy of my medical report to the following email address:')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('Email Address: ………………………………………………………………………..')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I am aware of the potential risks associated with electronic communication, such as unauthorized access or interception. Despite these risks, I understand and accept that email is a convenient and efficient means of transmitting documents.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I acknowledge that by giving my consent, I release Bridges Speech Center LLC and its staff from any liability arising from the electronic transmission of my medical report via email.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('I also understand that once my medical report is sent via email, it may be stored in the recipient\'s email system and potentially accessed by authorized personnel for the purposes specified in this consent letter.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('Please note that this consent is valid until explicitly revoked by me in writing. I reserve the right to revoke this consent at any time by notifying Bridges Speech Center LLC in writing.')
                    ->columnSpanFull()->size(TextSize::Large),

                Text::make('Thank you for your attention to this matter. Should you require any further information or clarification, please do not hesitate to contact me at the provided contact details.')
                    ->columnSpanFull()->size(TextSize::Large),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_of_birth')->native(false),
                TextInput::make('phone_no')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                SignaturePad::make('signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                DatePicker::make('date')->native(false),
                Text::make("I, [Patient's Full Name], hereby authorize the release of my/ my ward……………………….. medical report to the following individual/organization. ")->size(TextSize::Large),
                TextInput::make('organization_name'),
                TextInput::make('organization_phone_no')
                    ->tel(),
                Textarea::make('organization_address')
                    ->columnSpanFull(),
                Textarea::make('organization_email')
                    ->columnSpanFull(),
                Text::make('I understand that the medical report may contain sensitive and confidential information regarding my or my child’s health and medical history.')
                    ->size(TextSize::Large),

                Text::make('By providing this consent, I acknowledge that the recipient may use and disclose this information for the purposes specified below.')
                    ->size(TextSize::Large),

                Text::make('Purpose of Release:')
                    ->size(TextSize::Large),

                Text::make('…………………………………………………………………………………………………………………')
                    ->size(TextSize::Large),

                Text::make('…………………………………………………………………………………………………………………')
                    ->size(TextSize::Large),

                Text::make('…………………………………………………………………………………………………………………')
                    ->size(TextSize::Large),

                Text::make('I understand that once the medical report is released, the recipient may have further disclosure rights as permitted by law.')
                    ->size(TextSize::Large),

                Text::make('I hereby release Bridges Speech Center LLC from any liability associated with the release of my medical information.')
                    ->size(TextSize::Large),

                Text::make('By signing below, I confirm that I have read and understood the contents of this consent form and willingly authorize the release of my medical report to the specified recipient for the purpose indicated.')
                    ->size(TextSize::Large),
                SignaturePad::make('parent_signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
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
