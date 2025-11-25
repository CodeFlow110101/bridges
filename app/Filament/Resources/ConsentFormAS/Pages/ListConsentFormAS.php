<?php

namespace App\Filament\Resources\ConsentFormAS\Pages;

use App\Filament\Resources\ConsentFormAS\ConsentFormAResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormAS extends ListRecords
{
    protected static string $resource = ConsentFormAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
