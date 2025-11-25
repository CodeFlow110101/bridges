<?php

namespace App\Filament\Resources\CaseAllotments\Pages;

use App\Filament\Resources\CaseAllotments\CaseAllotmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCaseAllotment extends ViewRecord
{
    protected static string $resource = CaseAllotmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
