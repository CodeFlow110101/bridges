<?php

namespace App\Filament\Resources\ConsentFormFS\Pages;

use App\Filament\Resources\ConsentFormFS\ConsentFormFResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormFS extends ListRecords
{
    protected static string $resource = ConsentFormFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
