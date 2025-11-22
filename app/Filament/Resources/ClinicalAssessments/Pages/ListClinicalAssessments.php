<?php

namespace App\Filament\Resources\ClinicalAssessments\Pages;

use App\Filament\Resources\ClinicalAssessments\ClinicalAssessmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClinicalAssessments extends ListRecords
{
    protected static string $resource = ClinicalAssessmentResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
