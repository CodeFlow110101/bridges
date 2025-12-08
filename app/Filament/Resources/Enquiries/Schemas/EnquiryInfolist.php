<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use App\Models\Enquiry;
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
                TextEntry::make('phone_no')->label("Phone No (In Dubai)"),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('school'),

                // Insurance
                TextEntry::make('is_insurance_covered')
                    ->label('Insurance Covered')
                    ->formatStateUsing(fn($state) => match ($state) {
                        0 => 'Yes',
                        1 => 'No',
                        2 => 'Unaware',
                        default => 'Unknown',
                    }),
                TextEntry::make('insurance_name')
                    ->label('Insurance Name'),

                // Referral
                TextEntry::make('referral_source')
                    ->label('Referral Source')
                    ->formatStateUsing(fn($state) => Enquiry::referralSourceOptions()[$state] ?? 'Unknown'),
                TextEntry::make('referral_source_name')
                    ->label('Referral Source (Details)'),

                // Services
                TextEntry::make('inquired_service')
                    ->label('Inquired Services by Client')
                    ->formatStateUsing(
                        fn($state) => collect($state)
                            ->map(fn($value) => Enquiry::enquiredServices()[$value] ?? $value)
                            ->join(', ')
                    ),
                TextEntry::make('other_service'),

                // Intervention / Assessment
                IconEntry::make('has_taken_intervention_before')
                    ->boolean(),
                TextEntry::make('intervention_details')
                    ->label('Intervention Details')
                    ->columnSpanFull(),

                IconEntry::make('is_assessment_required')
                    ->boolean(),
                TextEntry::make('assessment_details')
                    ->label('Assessment Details')
                    ->columnSpanFull(),

                // Discussion details
                TextEntry::make('cost_of_service')
                    ->label('Cost of service mentioned'),
                IconEntry::make('is_report_provided')
                    ->label('Report Provided')
                    ->boolean(),
                TextEntry::make('other_info')
                    ->label('Other Information')
                    ->columnSpanFull(),
                IconEntry::make('is_client_satisfied')
                    ->label('Client satisfied')
                    ->boolean(),

                // Referral response
                TextEntry::make('date_of_enquiry_answered')
                    ->date(),
                TextEntry::make('description_of_response')
                    ->label('Description of response')
                    ->columnSpanFull(),

                // Appointment
                IconEntry::make('is_appoinment_booked')
                    ->label('Appointment Booked')
                    ->boolean(),
                TextEntry::make('appoinment_date_and_time')
                    ->dateTime(),
                TextEntry::make('supervisor_name')
                    ->label('Appointment Supervisor'),
                TextEntry::make('details_when_appoinment_not_booked')
                    ->label('Details when appointment not booked')
                    ->columnSpanFull(),

                // Session
                IconEntry::make('has_scheduled_session')
                    ->label('Has Scheduled Session')
                    ->boolean(),
                TextEntry::make('session_date_and_time')
                    ->dateTime(),
                TextEntry::make('session_supervisor_name')
                    ->label('Session Supervisor'),
                TextEntry::make('details_when_session_not_scheduled')
                    ->label('Details when session not scheduled')
                    ->columnSpanFull(),

                // Timestamps
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ])->columns(2);
    }
}
