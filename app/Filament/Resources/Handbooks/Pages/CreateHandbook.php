<?php

namespace App\Filament\Resources\Handbooks\Pages;

use App\Filament\Resources\Handbooks\HandbookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHandbook extends CreateRecord
{
    protected static string $resource = HandbookResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
