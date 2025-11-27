<?php

namespace App\Filament\Resources\ConsentFormHS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\UnorderedList;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class ConsentFormHForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Text::make('At Bridges Speech Center we empower our clients across all age groups to overcome challenges and to gain confidence.')
                    ->size(TextSize::Large),

                Text::make('Each program offered at Bridges Speech Center enhances and enriches the lives and futures of all of our clients and their families.')
                    ->size(TextSize::Large),

                Text::make('Health Information Collection Statement')
                    ->size(TextSize::Large),

                Text::make('Bridges Speech Center LLC needs to collect information about you for the primary purpose of providing quality assessment and treatment services.')
                    ->size(TextSize::Large),

                Text::make('This information will be used for the administrative purposes of running the practice such as billing you or through an insurer, charity organization or another funding body.')
                    ->size(TextSize::Large),

                Text::make('Information will be used within the practice for handover when a professional/therapist will be providing you with ongoing assistance.')
                    ->size(TextSize::Large),

                Text::make('Bridges Speech Center LLC takes all reasonable steps to ensure that information collected about you is accurate.')
                    ->size(TextSize::Large),

                Text::make('However, if you do not provide relevant personal or health information, in part or full, to the therapist, it may result in incomplete assessment.')
                    ->size(TextSize::Large),

                Text::make('This may impact the diagnosis and the therapy that is provided.')
                    ->size(TextSize::Large),

                Text::make('Therapists may disclose information regarding diagnosis or treatment to your doctor or others (teachers/therapists) only with your consent.')
                    ->size(TextSize::Large),

                Text::make('We do not disclose your personal information to overseas recipients.')
                    ->size(TextSize::Large),

                Text::make('Information and client files are stored securely, and only the concerned staff can access it.')
                    ->size(TextSize::Large),

                Text::make('You may have access to your information on request and if you believe that any of the information is inaccurate, we may be able to amend it accordingly.')
                    ->size(TextSize::Large),

                Text::make('In case of any concerns or queries, please contact Ms. Surya Hari (Clinic Manager) or Ms. Rupali Ranjith (Director) at 04-3581115 or 0505226054.')
                    ->size(TextSize::Large),

                Text::make('Guidelines for Effective Intervention Program')
                    ->size(TextSize::Large),

                Text::make('Basis for all therapy is mutual respect and courtesy. Any kind of disrespect (verbal, nonverbal, overt or covert) is likely to end in cancelled sessions.')
                    ->size(TextSize::Large),

                UnorderedList::make([
                    'All are requested to respect each other’s time. Sessions shall start and end at the time allotted.',
                    'Active participation of parents/caregivers (one of them) in the session is desirable.',
                    'The parent shall make notes, raise doubts, and discuss the session contributing to the progress of the ward.',
                    'This discussion shall be held at the end of the session to ensure continuity and avoid distraction of the child’s involvement.',
                    'Video recording of the session is not allowed as it leads to diversion of attention of all concerned.',
                    'All therapy sessions are done under video monitoring as per CDA guidelines to ensure the safety of your wards and proper supervision.',
                ])
                    ->size(TextSize::Large),
                Text::make('Cancellation/Replacement Policy')
                    ->size(TextSize::Large),

                Text::make('This document contains important information about our policies, as well as your rights and certain limitations...')
                    ->size(TextSize::Small),

                Text::make('Fees /Payment Conditions and Cancellation Policies')
                    ->size(TextSize::Large),

                UnorderedList::make([
                    'Therapy fees should be paid at the beginning of the month. A finance charge of 3% of unpaid dues is added after the 3-day grace period.',
                    'In case of any cancellation of sessions, the following rules apply:',
                ]),

                UnorderedList::make([
                    'All advance cancellations done 12 hours before the session will receive replacement sessions.',
                    'Cancellations within 10 hours count as short notice—no replacement will be given and the session is charged normally.',
                    'For unexpected illness, call by 9:00 AM / 4 hours before the session. With a valid medical certificate, sessions become eligible for replacement.',
                    'Maximum 2 cancellations per month allowed unless due to vacation/illness (medical certificate required).',
                    'Replacement sessions must be completed within the same month or they will be void.',
                    'Replacement is only provided for sessions canceled due to therapist absence.',
                    'If more than 2 consecutive sessions are canceled without a valid reason/vacation, the scheduled slot will not be retained.',
                    'Vacations must be informed 1 month in advance.',
                    'If the therapist is unavailable due to illness/training, make-up sessions will be provided.',
                    'If a therapist goes on annual leave, sessions will be transferred to another qualified therapist.',
                    'Replacement sessions must be completed within the same billing cycle and only during available free slots (9 AM – 6 PM).',
                    'Pending replacement sessions cannot be converted to regular sessions.'
                ]),

                UnorderedList::make([
                    'Session fee includes direct therapy time and consultation with family.',
                    'For monthly/3/6/8-month packages: If terminated early, 20% of total amount is deducted and attended sessions are recalculated at single-session rate.',
                    'Sessions end at scheduled time even if started late. If the delay is from the therapist’s side, charges will be adjusted. If client is late, charges remain unchanged.',
                    'Package sessions must be completed within the same month. No breaking or refunding of discounted packages.',
                    'If package is terminated, refund calculation will be based on individual session rates.',
                    'Occupational therapy: When two therapists are available, two children may be taken in the OT room while following distancing guidelines.',
                ]),

                Text::make('Parents have the right to object to any service or personnel. They may contact Admin/Consultant for concerns.')
                    ->size(TextSize::Small),

                Text::make('Signing below confirms that you have read and agree to the terms.')
                    ->size(TextSize::Small),

                Text::make('I ……………………………………..(parent/guardian/spouse), have read the above information and understand the reasons for collecting the information about ……………………………….(Name) and the ways in which the information may be used.'),

                Text::make('I understand that it is my choice as to what information I provide and that withholding or falsifying information might act against the best interests of my son’s/daughter’s/spouse/……………... assessment and therapy progress.'),

                Text::make('I am aware that I can access my child’s personal and treatment information on request and, if necessary, correct information that I believe to be accurate.'),

                Text::make('I understand that if, in exceptional circumstances, access is denied for legitimate purposes, the reasons for this and possible remedies will be made available to me.'),

                Text::make('I have been well informed about the therapy sessions (ABA/ST/OT) that I/my child will be attending with the therapist/consultant.'),

                Text::make('I understand that the therapist/center must obtain additional consent if the information collected is to be used in any way other than what is outlined above.'),
                SignaturePad::make('signature')->dotSize(2.0)
                    ->lineMinWidth(0.5)
                    ->lineMaxWidth(2.5)
                    ->throttle(16)
                    ->minDistance(5)
                    ->velocityFilterWeight(0.7)
                    ->backgroundColor('rgba(255, 255, 255, 1)')
                    ->penColor('#000000')
                    ->penColorOnDark('#000000'),
                DateTimePicker::make('date_and_time')->native(false),
                TextInput::make('name'),
                DatePicker::make('date_of_birth')->native(false),
                TextInput::make('parent_name'),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('phone_no')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
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
