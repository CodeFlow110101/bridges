<?php

namespace App\Filament\Resources\ConsentFormCS\Pages;

use App\Filament\Resources\ConsentFormCS\ConsentFormCResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormC extends EditRecord
{
    protected static string $resource = ConsentFormCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
