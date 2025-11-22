<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Pages;

use App\Filament\Resources\StaffEnrollmentTrainings\StaffEnrollmentTrainingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStaffEnrollmentTraining extends ViewRecord
{
    protected static string $resource = StaffEnrollmentTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
