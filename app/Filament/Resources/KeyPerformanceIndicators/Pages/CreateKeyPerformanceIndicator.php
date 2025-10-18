<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Pages;

use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKeyPerformanceIndicator extends CreateRecord
{
    protected static string $resource = KeyPerformanceIndicatorResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
