<?php

namespace App\Filament\Resources\CaseAllotments\Pages;

use App\Filament\Resources\CaseAllotments\CaseAllotmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCaseAllotments extends ListRecords
{
    protected static string $resource = CaseAllotmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
