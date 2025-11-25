<?php

namespace App\Filament\Resources\ClientInterventions\Pages;

use App\Filament\Resources\ClientInterventions\ClientInterventionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClientIntervention extends ViewRecord
{
    protected static string $resource = ClientInterventionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
