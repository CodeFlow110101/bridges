<?php

namespace App\Filament\Resources\ClinicalAssessments\Pages;

use App\Filament\Resources\ClinicalAssessments\ClinicalAssessmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClinicalAssessment extends EditRecord
{
    protected static string $resource = ClinicalAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
