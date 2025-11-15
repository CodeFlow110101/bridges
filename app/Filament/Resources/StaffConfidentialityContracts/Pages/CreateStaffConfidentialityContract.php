<?php

namespace App\Filament\Resources\StaffConfidentialityContracts\Pages;

use App\Filament\Resources\StaffConfidentialityContracts\StaffConfidentialityContractResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStaffConfidentialityContract extends CreateRecord
{
    protected static string $resource = StaffConfidentialityContractResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
