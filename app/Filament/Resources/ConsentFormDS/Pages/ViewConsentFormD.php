<?php

namespace App\Filament\Resources\ConsentFormDS\Pages;

use App\Filament\Resources\ConsentFormDS\ConsentFormDResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormD extends ViewRecord
{
    protected static string $resource = ConsentFormDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
