<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Pages;

use App\Filament\Resources\AppoinmentReportReminders\AppoinmentReportReminderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAppoinmentReportReminders extends ListRecords
{
    protected static string $resource = AppoinmentReportReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
