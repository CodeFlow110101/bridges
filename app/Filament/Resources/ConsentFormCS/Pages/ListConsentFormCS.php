<?php

namespace App\Filament\Resources\ConsentFormCS\Pages;

use App\Filament\Resources\ConsentFormCS\ConsentFormCResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormCS extends ListRecords
{
    protected static string $resource = ConsentFormCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
