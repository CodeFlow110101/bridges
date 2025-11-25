<?php

namespace App\Filament\Resources\CaseAllotments\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\UnorderedList;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class CaseAllotmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('keyword'),
                TextInput::make('category')
                    ->required(),
                Textarea::make('location')
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->columnSpanFull()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name}"),
                Text::make("Objective: To ensure seamless continuity of therapy services for clients during a therapist's absence by preparing a secondary therapist and maintaining clear, comprehensive client documentation.")->size(TextSize::Large),
                Text::make("Case Assignment Structure"),
                UnorderedList::make([
                    'Primary Therapist: A strong or highly trained therapist assigned to lead the case.',
                    'Secondary Therapist: A less experienced therapist who supports and learns from the primary therapist. In the absence of the primary therapist, the secondary therapist takes over.',
                ]),
                Text::make("Training and Preparation"),
                UnorderedList::make([
                    "Parallel Training Sessions: The secondary therapist must observe and participate in at least 4-6 sessions with the primary therapist before the latter's scheduled absence. These sessions serve as hands-on training and familiarization with the client's needs and therapy procedures.",
                    'Cheat Sheet Preparation:o The primary therapist must prepare a detailed cheat sheet for each client, covering all essential aspects of their therapy. This cheat sheet should include:',
                ]),
                UnorderedList::make([
                    "Client Profile: Key information about the client, including specific needs, challenges, strengths, and progress to date.",
                    'Therapy Goals: Current goals and objectives, including any recent changes or adjustments.',
                    'Session Structure: A typical session outline, including preferred activities, interventions, and strategies.',
                    'Behavioral Considerations: Any known triggers, calming techniques, and behavior management strategies.',
                    "Communication with Parents: Key points about the parents' preferences, expectations, and any specific requirements.",
                ]),
                UnorderedList::make([
                    'Pre-Holiday Procedures',
                ]),
                UnorderedList::make([
                    "Cheat Sheet Submission: The cheat sheet must be completed and submitted to the clinical supervisor at least one week before the primary therapist's scheduled leave.",
                    "Discussion with Supervisor: The primary therapist should have a detailed discussion with the clinical supervisor and secondary therapist to review the cheat sheet, ensuring all parties are clear on the client's needs and the therapy plan.",
                    "Client and Parent Briefing: If applicable, the primary therapist should introduce the secondary therapist to the client and parents, explaining the temporary transition and addressing any questions or concerns.",
                ]),
                UnorderedList::make([
                    'Documentation and Forms',
                ]),
                UnorderedList::make([
                    'Cheat Sheet Form: A standardized form must be used to ensure consistency and comprehensiveness. This form should include sections for all the information outlined in the cheat sheet preparation.',
                    "Observation and Feedback Forms: Secondary therapists should use these forms during their parallel training sessions to document their observations and receive feedback from the primary therapist."
                ]),
                UnorderedList::make([
                    'Progress report Submission:',
                ]),
                UnorderedList::make([
                    'For ABA progress report: Submission of progress report and review and planning for upcoming sessions is done either at the end of 6th month into therapy or after 120 session.',
                    'For Speech Progress report: Submission of progress report and review and planning for upcoming sessions is done either at the end of 6th month into therapy or after 120 session.',
                    'For OT progress report: Secondary therapists should use these forms during their parallel training sessions to document their observations and receive feedback from the primary therapist.'
                ]),
                UnorderedList::make([
                    'Ongoing Support and Supervision',
                ]),
                UnorderedList::make([
                    "Regular Check-ins: The clinical supervisor should check in regularly with the secondary therapist during the primary therapist's absence to provide support and guidance.",
                    "Post-Holiday Review: Upon the primary therapist's return, a review meeting should be held to discuss any issues encountered during the absence, evaluate the secondary therapist's performance, and ensure continuity of care."
                ]),
                Text::make("This protocol aims to maintain high-quality care for our clients and ensure smooth transitions during staff absences. By adhering to these guidelines, we can continue to meet the needs of both our clients and their families effectively."),
            ])->columns(1);
    }
}
