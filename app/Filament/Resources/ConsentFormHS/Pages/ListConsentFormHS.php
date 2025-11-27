<?php

namespace App\Filament\Resources\ConsentFormHS\Pages;

use App\Filament\Resources\ConsentFormHS\ConsentFormHResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormHS extends ListRecords
{
    protected static string $resource = ConsentFormHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
