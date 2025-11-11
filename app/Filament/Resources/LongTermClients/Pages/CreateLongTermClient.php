<?php

namespace App\Filament\Resources\LongTermClients\Pages;

use App\Filament\Resources\LongTermClients\LongTermClientResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLongTermClient extends CreateRecord
{
    protected static string $resource = LongTermClientResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
