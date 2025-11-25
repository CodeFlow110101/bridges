<?php

namespace App\Filament\Resources\ConsentFormBS\Pages;

use App\Filament\Resources\ConsentFormBS\ConsentFormBResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormB extends ViewRecord
{
    protected static string $resource = ConsentFormBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
