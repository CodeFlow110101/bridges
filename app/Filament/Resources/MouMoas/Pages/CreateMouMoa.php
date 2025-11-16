<?php

namespace App\Filament\Resources\MouMoas\Pages;

use App\Filament\Resources\MouMoas\MouMoaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMouMoa extends CreateRecord
{
    protected static string $resource = MouMoaResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
