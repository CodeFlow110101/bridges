<?php

namespace App\Filament\Resources\CaseAllotments\Pages;

use App\Filament\Resources\CaseAllotments\CaseAllotmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCaseAllotment extends EditRecord
{
    protected static string $resource = CaseAllotmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
