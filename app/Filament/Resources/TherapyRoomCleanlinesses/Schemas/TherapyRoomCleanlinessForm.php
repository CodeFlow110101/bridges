<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\UnorderedList;

class TherapyRoomCleanlinessForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('Therapy Room Cleanliness Checklist')->size(TextSize::Large),
                Text::make('To ensure the therapy room is kept clean and organized, therapists must follow this checklist:')->size(TextSize::Small),
                Text::make('General Cleanliness')->size(TextSize::Medium),
                UnorderedList::make([
                    Text::make('Dirty Tissue Disposal: Keep a small tray under the table for dirty tissues.')->size(TextSize::Small),
                    Text::make('Toys and Documents: Do not collect toys, documents, or Writing pads on the table. Once used, keep it back in tray. Keep things which are required often.')->size(TextSize::Small),
                    Text::make('Sanitizer and Supplies: Ensure sanitizer, alcohol spray, and fresh tissue dispensing box are kept on the table.')->size(TextSize::Small),
                    Text::make('Used Materials: Do not keep any dirty or used materials in the box.')->size(TextSize::Small),
                    Text::make('Snack Items: Do not keep snack items in the room to avoid rat infestation.')->size(TextSize::Small),
                    Text::make('Coffee: Do not drink coffee in the therapy room.')->size(TextSize::Small),
                ]),
                Text::make('Safety and Maintenance')->size(TextSize::Medium),
                UnorderedList::make([
                    Text::make('Safety Padding: Ensure safety and protection padding is added to corners of wall as well as table are in good condition.')
                        ->size(TextSize::Small),

                    Text::make('Reporting Damage: If anything is broken, immediately inform about client’s name, time, and room number in Super Team.')
                        ->size(TextSize::Small),
                ])->size(TextSize::Small),
                Text::make('End of Session Protocol')->size(TextSize::Medium),
                UnorderedList::make([
                    Text::make('Toy Shuffling: At the end of toy shuffling, make sure all toys are in good condition and in place before handing over to the next assigned therapist.')
                        ->size(TextSize::Small),

                    Text::make('Collect Supplies: Ensure the following items are collected and ready:')
                        ->size(TextSize::Small),
                ])->size(TextSize::Small),
                UnorderedList::make([
                    Text::make('Notebook')->size(TextSize::Small),
                    Text::make('Writing pad')->size(TextSize::Small),
                    Text::make('Timer')->size(TextSize::Small),
                    Text::make('Token board')->size(TextSize::Small),
                    Text::make('Clicker (for ABA therapists)')->size(TextSize::Small),
                ])->size(TextSize::Small),
                Text::make('Acknowledgement:')->size(TextSize::Large),
                Text::make('I, the undersigned, have read and understood the cleanliness requirements and agree to comply with them at all times while on duty.')
                    ->size(TextSize::Small),

                TextInput::make('name')
                    ->required(),
                SignaturePad::make('signature')->label('Signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                DatePicker::make('date')->native(false),
                Text::make('© 2024 Your Company. All rights reserved.')->size(TextSize::Small),
            ])->columns(1);
    }
}
