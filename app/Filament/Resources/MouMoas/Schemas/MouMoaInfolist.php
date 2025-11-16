<?php

namespace App\Filament\Resources\MouMoas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MouMoaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('second_party_name'),
                TextEntry::make('second_party_location'),
                TextEntry::make('date_of_amendment')
                    ->date(),
                TextEntry::make('date_of_termination')
                    ->date(),
                TextEntry::make('set_alert_for_renewal'),
                TextEntry::make('branch'),
                TextEntry::make('contract_validity_till_no_of_years'),
                TextEntry::make('speech_therapy_cost'),
                TextEntry::make('occupational_therapy_cost'),
                TextEntry::make('behavioural_therapy_cost'),
                TextEntry::make('psychoeducational_assessment_cost'),
                TextEntry::make('physiotherapy_cost'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
