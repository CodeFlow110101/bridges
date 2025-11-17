<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses\Pages;

use App\Filament\Resources\TherapyRoomCleanlinesses\TherapyRoomCleanlinessResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTherapyRoomCleanlinesses extends ListRecords
{
    protected static string $resource = TherapyRoomCleanlinessResource::class;

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
