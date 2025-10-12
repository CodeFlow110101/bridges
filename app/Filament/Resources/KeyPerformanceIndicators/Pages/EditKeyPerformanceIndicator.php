<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Pages;

use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKeyPerformanceIndicator extends EditRecord
{
    protected static string $resource = KeyPerformanceIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
