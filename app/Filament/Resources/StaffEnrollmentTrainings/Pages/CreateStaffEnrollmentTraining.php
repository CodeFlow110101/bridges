<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Pages;

use App\Filament\Resources\StaffEnrollmentTrainings\StaffEnrollmentTrainingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStaffEnrollmentTraining extends CreateRecord
{
    protected static string $resource = StaffEnrollmentTrainingResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
