<?php

namespace App\Filament\Resources\Interventions\Pages;

use App\Filament\Resources\Interventions\InterventionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIntervention extends CreateRecord
{

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }

    protected static string $resource = InterventionResource::class;
}
