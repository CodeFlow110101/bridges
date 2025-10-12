<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardBanner extends Widget
{

    public function getColumnSpan(): int | string | array
    {
        return  ["sm" => 2, "max-sm" => 1];
    }

    protected string $view = 'volt-livewire::filament.widgets.dashboard-banner';
}
