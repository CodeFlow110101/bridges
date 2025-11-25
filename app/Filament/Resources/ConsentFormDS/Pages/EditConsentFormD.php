<?php

namespace App\Filament\Resources\ConsentFormDS\Pages;

use App\Filament\Resources\ConsentFormDS\ConsentFormDResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormD extends EditRecord
{
    protected static string $resource = ConsentFormDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
