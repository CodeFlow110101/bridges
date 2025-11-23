<?php

namespace App\Filament\Resources\MOMS\Pages;

use App\Filament\Resources\MOMS\MOMResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMOMS extends ListRecords
{
    protected static string $resource = MOMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
