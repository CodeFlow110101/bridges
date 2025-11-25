<?php

namespace App\Filament\Resources\ConsentFormAS\Pages;

use App\Filament\Resources\ConsentFormAS\ConsentFormAResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormA extends ViewRecord
{
    protected static string $resource = ConsentFormAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
