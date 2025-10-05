<?php

namespace App\Filament\Resources\ClinicalAssessments\Pages;

use App\Filament\Resources\ClinicalAssessments\ClinicalAssessmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClinicalAssessments extends ListRecords
{
    protected static string $resource = ClinicalAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
