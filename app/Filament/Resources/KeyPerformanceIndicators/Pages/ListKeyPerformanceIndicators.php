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

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
