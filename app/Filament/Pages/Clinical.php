<?php

namespace App\Filament\Pages;

use App\Filament\Resources\ClinicalAssessments\ClinicalAssessmentResource;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use App\Livewire\Resource;

class Clinical extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    public static function getHeadingForPages()
    {
        return Str::of(Str::of(self::class)->explode('\\')->pop())->headline();
    }

    protected function getHeaderWidgets(): array
    {
        return self::getResources();
    }

    static function getResources()
    {
        return [
            Resource::make(["classes" => [ClinicalAssessmentResource::class]]),
        ];
    }
}
