<?php

namespace App\Filament\Resources\ConsentFormGS\Pages;

use App\Filament\Resources\ConsentFormGS\ConsentFormGResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormGS extends ListRecords
{
    protected static string $resource = ConsentFormGResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
