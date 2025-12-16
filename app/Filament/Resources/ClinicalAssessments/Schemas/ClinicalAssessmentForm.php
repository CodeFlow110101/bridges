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
                    ->columnSpanFull()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number'),
                TextInput::make('name'),
                DatePicker::make("date")->native(false),
                TextInput::make('referral_source'),
                Textarea::make('discussed')
                    ->required()
                    ->columnSpanFull(),
                Section::make("Msl")
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
                            ->inline()
                            ->options(ClinicalAssessment::mslOptions()),
                    ])->columnSpanFull(),
                TextInput::make('caregiver_name'),
                TextInput::make('other_infomration'),
                Textarea::make('investigation_procedure')
                    ->columnSpanFull(),
                Textarea::make('client_revisit_information')
                    ->columnSpanFull(),
                FileUpload::make('case_history')->directory('files')
                    ->columnSpanFull(),
                FileUpload::make('assessment')->directory('files')
                    ->columnSpanFull(),
                TextInput::make('therapy_enrollment'),
                TextInput::make('supervisors_name'),
                Toggle::make('is_document_provided')->label("Is relevant information and documents provided to supervisor and therapist?")
                    ->columnSpanFull(),
                Textarea::make('information_to_be_aware_of')
                    ->label("Information therapist and supervisor to be aware of?")
                    ->columnSpanFull(),
                Textarea::make('future_reference')
                    ->columnSpanFull(),
            ]);
    }
}
