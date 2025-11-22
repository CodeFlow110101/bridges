<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Pages;

use App\Filament\Resources\StaffEnrollmentTrainings\StaffEnrollmentTrainingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStaffEnrollmentTraining extends EditRecord
{
    protected static string $resource = StaffEnrollmentTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
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
