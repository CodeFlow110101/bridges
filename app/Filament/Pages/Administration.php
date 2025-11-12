<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Filament\Resources\Interventions\InterventionResource;
use App\Filament\Resources\Invoices\InvoiceResource;
use App\Filament\Resources\LongTermClients\LongTermClientResource;
use App\Livewire\Resource;
use Filament\Pages\Page;
use Illuminate\Support\Str;

class Administration extends Page
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
            Resource::make(["classes" => [InterventionResource::class, EnquiryResource::class, LongTermClientResource::class, InvoiceResource::class]]),
        ];
    }
}
