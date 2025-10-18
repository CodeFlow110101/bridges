<?php

namespace App\Filament\Resources\InductionPrograms\Pages;

use App\Filament\Resources\InductionPrograms\InductionProgramResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInductionProgram extends CreateRecord
{
    protected static string $resource = InductionProgramResource::class;

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
