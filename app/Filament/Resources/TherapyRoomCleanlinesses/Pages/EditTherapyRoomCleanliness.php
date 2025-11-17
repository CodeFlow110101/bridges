<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Pages;

use App\Filament\Resources\TherapyRoomCleanlinesses\TherapyRoomCleanlinessResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTherapyRoomCleanliness extends EditRecord
{
    protected static string $resource = TherapyRoomCleanlinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
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
