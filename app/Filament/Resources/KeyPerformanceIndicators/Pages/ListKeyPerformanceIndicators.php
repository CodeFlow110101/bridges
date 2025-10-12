<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Pages;

use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKeyPerformanceIndicators extends ListRecords
{
    protected static string $resource = KeyPerformanceIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
