<?php

namespace App\Filament\Resources\ConsentFormHS\Pages;

use App\Filament\Resources\ConsentFormHS\ConsentFormHResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormH extends EditRecord
{
    protected static string $resource = ConsentFormHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
