<?php

namespace App\Filament\Resources\DemonstrationTherapies\Pages;

use App\Filament\Resources\DemonstrationTherapies\DemonstrationTherapyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDemonstrationTherapy extends ViewRecord
{
    protected static string $resource = DemonstrationTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
