<?php

namespace App\Filament\Resources\ConsentFormDS\Pages;

use App\Filament\Resources\ConsentFormDS\ConsentFormDResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormDS extends ListRecords
{
    protected static string $resource = ConsentFormDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
