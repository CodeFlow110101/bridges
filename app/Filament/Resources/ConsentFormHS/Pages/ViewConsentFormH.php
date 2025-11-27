<?php

namespace App\Filament\Resources\ConsentFormHS\Pages;

use App\Filament\Resources\ConsentFormHS\ConsentFormHResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormH extends ViewRecord
{
    protected static string $resource = ConsentFormHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
