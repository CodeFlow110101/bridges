<?php

namespace App\Filament\Resources\ClientInterventions\Pages;

use App\Filament\Resources\ClientInterventions\ClientInterventionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClientInterventions extends ListRecords
{
    protected static string $resource = ClientInterventionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
