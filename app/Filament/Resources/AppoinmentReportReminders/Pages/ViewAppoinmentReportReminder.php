<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Pages;

use App\Filament\Resources\AppoinmentReportReminders\AppoinmentReportReminderResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAppoinmentReportReminder extends ViewRecord
{
    protected static string $resource = AppoinmentReportReminderResource::class;

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
