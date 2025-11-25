<?php

namespace App\Filament\Resources\ConsentFormAS\Pages;

use App\Filament\Resources\ConsentFormAS\ConsentFormAResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormA extends EditRecord
{
    protected static string $resource = ConsentFormAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
