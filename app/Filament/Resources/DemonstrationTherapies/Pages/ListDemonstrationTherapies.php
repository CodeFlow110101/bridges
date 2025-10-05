<?php

namespace App\Filament\Resources\DemonstrationTherapies\Pages;

use App\Filament\Resources\DemonstrationTherapies\DemonstrationTherapyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDemonstrationTherapies extends ListRecords
{
    protected static string $resource = DemonstrationTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
