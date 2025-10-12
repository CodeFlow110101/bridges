<?php

namespace App\Filament\Pages;

use App\Filament\Resources\DisputeManagement\DisputeManagementResource;
use App\Filament\Resources\EndServices\EndServiceResource;
use App\Filament\Resources\InductionPrograms\InductionProgramResource;
use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\WarningLetters\WarningLetterResource;
use App\Livewire\Resource;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\Pages\Enums\SubNavigationPosition;

use UnitEnum;

class HumanResource extends Page
{

    protected ?string $subheading = 'Staff Details';

    protected static string | UnitEnum | null $navigationGroup = 'Clinical Management';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    protected function getHeaderWidgets(): array
    {
        return [
            Resource::make(["classes" => [UserResource::class, EndServiceResource::class, WarningLetterResource::class, DisputeManagementResource::class, KeyPerformanceIndicatorResource::class, InductionProgramResource::class]]),
        ];
    }
}
