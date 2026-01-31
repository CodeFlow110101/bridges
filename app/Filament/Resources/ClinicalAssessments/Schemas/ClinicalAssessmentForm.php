<?php

namespace App\Filament\Resources\ClinicalAssessments\Schemas;

use App\Models\ClinicalAssessment;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use App\Models\Enquiry;

class ClinicalAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('inquiry_id')
                    ->label("Inquiry Number")
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->live()
                    ->columnSpanFull()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number')
                    ->afterStateUpdated(function ($state, callable $set) {
                        $enquiry = Enquiry::find($state);
                        $set('name', $enquiry?->name);
                        $set('date', $enquiry?->date);
                        $set('referral_source', collect(Enquiry::referralSourceOptions())->get($enquiry->referral_source));
                    }),
                TextInput::make('name')->disabled(),
                DatePicker::make("date")->native(false)->disabled(),
                TextInput::make('referral_source')->disabled(),
                Textarea::make('discussed')
                    ->required()
                    ->columnSpanFull(),
                Section::make("Features of Caregiver")
                    ->schema([
                        Radio::make('mother_msl')
                            ->inline()
                            ->options(ClinicalAssessment::mslOptions()),
                        Radio::make('father_msl')
                            ->inline()
                            ->options(ClinicalAssessment::mslOptions()),
                        Radio::make('caregiver_msl')
                            ->inline()
                            ->options(ClinicalAssessment::mslOptions()),
                        Radio::make('whom_msl')
                        ->label("Whom communicate to: (MSL)")
                            ->inline()
                            ->options(ClinicalAssessment::mslOptions()),
                    ])->columnSpanFull(),
                TextInput::make('caregiver_name')->label("Caregiver’s Name and relationship (If any)"),
                TextInput::make('other_infomration'),
                Textarea::make('investigation_procedure')
                    ->columnSpanFull(),
                Textarea::make('client_revisit_information')
                    ->label("Other information to be aware of when client will revisit")
                    ->columnSpanFull(),
                FileUpload::make('case_history')->directory('files')
                ->label("Case History")
                    ->columnSpanFull(),
                FileUpload::make('assessment')->directory('files')
                ->label("Assessment")
                    ->columnSpanFull(),
                TextInput::make('therapy_enrollment')->label("Therapist’s name/names "),
                TextInput::make('supervisors_name'),
                Toggle::make('is_document_provided')->label("Is relevant information and documents provided to supervisor and therapist?")
                ->live()
                ->columnSpanFull(),
                Textarea::make('document_description')
                    ->label("Document Description")
                    ->columnSpanFull()->visible(fn($get) => !$get('is_document_provided')),
                Textarea::make('information_to_be_aware_of')
                    ->label("Information therapist and supervisor to be aware of?")
                    ->columnSpanFull(),
                Textarea::make('future_reference')
                    ->columnSpanFull(),
            ]);
    }
}
