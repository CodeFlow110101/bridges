<?php

namespace App\Filament\Resources\ClientInterventions\Pages;

use App\Filament\Resources\ClientInterventions\ClientInterventionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClientIntervention extends EditRecord
{
    protected static string $resource = ClientInterventionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
