<?php

namespace App\Filament\Resources\StaffConfidentialityContracts\Pages;

use App\Filament\Resources\StaffConfidentialityContracts\StaffConfidentialityContractResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaffConfidentialityContracts extends ListRecords
{
    protected static string $resource = StaffConfidentialityContractResource::class;

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
