<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AppoinmentReportReminderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('client_name'),
                TextEntry::make('date_and_time')
                    ->date(),
                TextEntry::make('phone_no_dubai'),
                TextEntry::make('phase')
                    ->numeric(),
                TextEntry::make('pattern'),
                TextEntry::make('client_name_intervention'),
                TextEntry::make('option_a_date_time')
                    ->date(),
                TextEntry::make('option_a_phone_no_dubai'),
                TextEntry::make('option_b_multiple_days_intervention')
                    ->numeric(),
                TextEntry::make('option_b_therapist_date_time')
                    ->date(),
                TextEntry::make('option_b_time_session_booked')
                    ->numeric(),
                TextEntry::make('option_b_department')
                    ->numeric(),
                TextEntry::make('option_c_date')
                    ->date(),
                TextEntry::make('inquiry_number'),
                TextEntry::make('consent_to')
                    ->numeric(),
                TextEntry::make('consent_to_insurance_name'),
                TextEntry::make('form_a_consent_to_school')
                    ->numeric(),
                TextEntry::make('form_a_consent_to_school_insurance_name'),
                TextEntry::make('form_b_consent_to_electronic_transfer')
                    ->numeric(),
                TextEntry::make('form_b_consent_to_electronic_transfer_insurance_name'),
                TextEntry::make('form_c_consent_to_social_media')
                    ->numeric(),
                TextEntry::make('form_c_consent_to_social_media_insurance_name'),
                TextEntry::make('form_e_allow_kid_to_dispatch')
                    ->numeric(),
                TextEntry::make('form_e_allow_kid_to_dispatch_insurance_name'),
                TextEntry::make('form_f_consent_to_group')
                    ->numeric(),
                TextEntry::make('form_f_consent_to_group_insurance_name'),
                TextEntry::make('form_d_consent_to_medicine')
                    ->numeric(),
                TextEntry::make('form_d_consent_to_medicine_insurance_name'),
                TextEntry::make('form_h_consent_to_enrolment')
                    ->numeric(),
                TextEntry::make('form_h_consent_to_enrolment_insurance_name'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
