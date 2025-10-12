<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Pages;

use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKeyPerformanceIndicator extends ViewRecord
{
    protected static string $resource = KeyPerformanceIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
