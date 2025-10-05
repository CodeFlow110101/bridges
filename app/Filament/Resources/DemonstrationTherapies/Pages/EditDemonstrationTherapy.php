<?php

namespace App\Filament\Resources\DemonstrationTherapies\Pages;

use App\Filament\Resources\DemonstrationTherapies\DemonstrationTherapyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDemonstrationTherapy extends EditRecord
{
    protected static string $resource = DemonstrationTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
