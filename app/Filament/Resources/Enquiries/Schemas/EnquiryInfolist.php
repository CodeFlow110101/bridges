<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('inquiry_number'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('name'),
                TextEntry::make('phone_no'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('school'),
                TextEntry::make('is_insurance_covered')
                    ->numeric(),
                TextEntry::make('insurance_name'),
                TextEntry::make('referral_source')
                    ->numeric(),
                TextEntry::make('referral_source_name')
                    ->numeric(),
                TextEntry::make('inquired_service')
                    ->numeric(),
                TextEntry::make('other_service'),
                IconEntry::make('has_taken_intervention_before')
                    ->boolean(),
                IconEntry::make('is_assessment_required')
                    ->boolean(),
                TextEntry::make('cost_of_service'),
                IconEntry::make('is_report_provided')
                    ->boolean(),
                IconEntry::make('is_client_satisfied')
                    ->boolean(),
                TextEntry::make('date_of_enquiry_answered')
                    ->date(),
                IconEntry::make('is_appoinment_booked')
                    ->boolean(),
                TextEntry::make('appoinment_date_and_time')
                    ->date(),
                TextEntry::make('supervisor_name'),
                IconEntry::make('has_scheduled_session')
                    ->boolean(),
                TextEntry::make('session_date_and_time')
                    ->date(),
                TextEntry::make('session_supervisor_name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
