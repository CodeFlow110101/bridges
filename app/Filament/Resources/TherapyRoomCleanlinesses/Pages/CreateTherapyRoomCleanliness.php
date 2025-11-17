<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Pages;

use App\Filament\Resources\TherapyRoomCleanlinesses\TherapyRoomCleanlinessResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTherapyRoomCleanliness extends CreateRecord
{
    protected static string $resource = TherapyRoomCleanlinessResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
