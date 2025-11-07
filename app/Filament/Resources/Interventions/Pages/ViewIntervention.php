<?php

namespace App\Filament\Resources\Interventions\Pages;

use App\Filament\Resources\Interventions\InterventionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIntervention extends ViewRecord
{
    protected static string $resource = InterventionResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
