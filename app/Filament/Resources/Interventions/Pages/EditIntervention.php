<?php

namespace App\Filament\Resources\Interventions\Pages;

use App\Filament\Resources\Interventions\InterventionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIntervention extends EditRecord
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
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
