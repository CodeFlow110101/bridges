<?php

namespace App\Filament\Resources\MOMS\Pages;

use App\Filament\Resources\MOMS\MOMResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMOM extends EditRecord
{
    protected static string $resource = MOMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
