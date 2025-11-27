<?php

namespace App\Filament\Resources\ConsentFormFS\Pages;

use App\Filament\Resources\ConsentFormFS\ConsentFormFResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormF extends ViewRecord
{
    protected static string $resource = ConsentFormFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
