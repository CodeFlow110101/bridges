<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Pages;

use App\Filament\Resources\TherapyRoomCleanlinesses\TherapyRoomCleanlinessResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTherapyRoomCleanliness extends ViewRecord
{
    protected static string $resource = TherapyRoomCleanlinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
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
