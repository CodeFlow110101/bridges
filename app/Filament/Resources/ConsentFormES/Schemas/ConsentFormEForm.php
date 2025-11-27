<?php

namespace App\Filament\Resources\ConsentFormES\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormEForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('This is to seek your permission regarding the sharing of videos on social media platforms featuring your child, …………………………………………………………… (child name).')
                    ->size(TextSize::Large),

                Text::make('As part of our therapeutic activities, we occasionally record videos of children participating in various therapeutic sessions, with prior parental consent.')
                    ->size(TextSize::Large),

                Text::make('These videos possess significant educational value for our parents and offer an opportunity for individuals who may face financial constraints in providing therapy services for their children to replicate these activities in their own homes.')
                    ->size(TextSize::Large),

                Text::make('We want to ensure that all parents are comfortable with the sharing of these videos on social media platforms. Please be assured that we prioritize the privacy and safety of our students.')
                    ->size(TextSize::Large),

                Text::make('By signing this consent form, you are granting permission for us to share videos featuring your child on our official social media platforms.')
                    ->size(TextSize::Large),

                Text::make('This consent is valid until explicitly revoked by you in writing.')
                    ->size(TextSize::Large),

                Text::make('Please review this consent form carefully, and if you agree to the terms and conditions, kindly sign and return the form to us at your earliest convenience.')
                    ->size(TextSize::Large),

                Text::make('Should you have any concerns or require further clarification, please do not hesitate to contact us.')
                    ->size(TextSize::Large),

                Text::make('Thank you for your attention to this matter, and for entrusting us with your child\'s education and well-being.')
                    ->size(TextSize::Large),

                Text::make('We appreciate your ongoing support in fostering a positive and inclusive community.')
                    ->size(TextSize::Large),

                Text::make('I acknowledge that the videos may be shared on platforms.')
                    ->size(TextSize::Large),

                Text::make('This consent is valid until explicitly revoked by me in writing.')
                    ->size(TextSize::Large),
                TextInput::make('parent_name'),
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
