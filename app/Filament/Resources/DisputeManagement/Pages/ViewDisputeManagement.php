<?php

namespace App\Filament\Resources\DisputeManagement\Pages;

use App\Filament\Resources\DisputeManagement\DisputeManagementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDisputeManagement extends ViewRecord
{
    protected static string $resource = DisputeManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
