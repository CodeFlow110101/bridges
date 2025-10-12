<?php

namespace App\Filament\Resources\InductionPrograms\Pages;

use App\Filament\Resources\InductionPrograms\InductionProgramResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInductionProgram extends ViewRecord
{
    protected static string $resource = InductionProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
