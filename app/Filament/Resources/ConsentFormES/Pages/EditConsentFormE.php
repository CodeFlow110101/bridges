<?php

namespace App\Filament\Resources\ConsentFormES\Pages;

use App\Filament\Resources\ConsentFormES\ConsentFormEResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsentFormE extends EditRecord
{
    protected static string $resource = ConsentFormEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
