<?php

namespace App\Filament\Resources\DisputeManagement\Pages;

use App\Filament\Resources\DisputeManagement\DisputeManagementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDisputeManagement extends EditRecord
{
    protected static string $resource = DisputeManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
