<?php

namespace App\Filament\Resources\ConsentFormES\Pages;

use App\Filament\Resources\ConsentFormES\ConsentFormEResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsentFormES extends ListRecords
{
    protected static string $resource = ConsentFormEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
