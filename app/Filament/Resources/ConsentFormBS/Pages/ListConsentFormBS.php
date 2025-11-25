<?php

namespace App\Filament\Resources\ConsentFormBS\Pages;

use App\Filament\Resources\ConsentFormBS\ConsentFormBResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormBS extends ListRecords
{
    protected static string $resource = ConsentFormBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
