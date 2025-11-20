<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Pages;

use App\Filament\Resources\AppoinmentReportReminders\AppoinmentReportReminderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAppoinmentReportReminder extends CreateRecord
{
    protected static string $resource = AppoinmentReportReminderResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
