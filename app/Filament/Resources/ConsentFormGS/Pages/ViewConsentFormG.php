<?php

namespace App\Filament\Resources\ConsentFormGS\Pages;

use App\Filament\Resources\ConsentFormGS\ConsentFormGResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormG extends ViewRecord
{
    protected static string $resource = ConsentFormGResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
