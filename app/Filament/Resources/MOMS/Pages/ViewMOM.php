<?php

namespace App\Filament\Resources\MOMS\Pages;

use App\Filament\Resources\MOMS\MOMResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMOM extends ViewRecord
{
    protected static string $resource = MOMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
