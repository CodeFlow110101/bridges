<?php

namespace App\Filament\Resources\LongTermClients\Pages;

use App\Filament\Resources\LongTermClients\LongTermClientResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLongTermClient extends EditRecord
{
    protected static string $resource = LongTermClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
