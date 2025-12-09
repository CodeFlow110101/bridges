<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Pages;

use App\Filament\Resources\AppoinmentReportReminders\AppoinmentReportReminderResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAppoinmentReportReminder extends EditRecord
{
    protected static string $resource = AppoinmentReportReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
