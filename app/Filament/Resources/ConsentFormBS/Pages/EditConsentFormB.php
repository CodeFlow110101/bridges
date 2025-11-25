<?php

namespace App\Filament\Resources\ConsentFormBS\Pages;

use App\Filament\Resources\ConsentFormBS\ConsentFormBResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormB extends EditRecord
{
    protected static string $resource = ConsentFormBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
