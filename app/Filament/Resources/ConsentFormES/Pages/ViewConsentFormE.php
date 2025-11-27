<?php

namespace App\Filament\Resources\ConsentFormES\Pages;

use App\Filament\Resources\ConsentFormES\ConsentFormEResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormE extends ViewRecord
{
    protected static string $resource = ConsentFormEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
