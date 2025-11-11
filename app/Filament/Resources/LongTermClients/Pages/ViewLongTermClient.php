<?php

namespace App\Filament\Resources\LongTermClients\Pages;

use App\Filament\Resources\LongTermClients\LongTermClientResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLongTermClient extends ViewRecord
{
    protected static string $resource = LongTermClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
