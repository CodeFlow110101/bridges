<?php

namespace App\Filament\Resources\ConsentFormGS\Pages;

use App\Filament\Resources\ConsentFormGS\ConsentFormGResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormG extends EditRecord
{
    protected static string $resource = ConsentFormGResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
