<?php

namespace App\Filament\Resources\ConsentFormFS\Pages;

use App\Filament\Resources\ConsentFormFS\ConsentFormFResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormF extends EditRecord
{
    protected static string $resource = ConsentFormFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
