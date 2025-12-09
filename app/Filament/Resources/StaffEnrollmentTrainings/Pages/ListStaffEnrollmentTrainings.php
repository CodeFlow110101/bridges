<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings\Pages;

use App\Filament\Resources\StaffEnrollmentTrainings\StaffEnrollmentTrainingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaffEnrollmentTrainings extends ListRecords
{
    protected static string $resource = StaffEnrollmentTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
