<?php

namespace App\Filament\Resources\ConsentFormCS\Pages;

use App\Filament\Resources\ConsentFormCS\ConsentFormCResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormC extends ViewRecord
{
    protected static string $resource = ConsentFormCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
