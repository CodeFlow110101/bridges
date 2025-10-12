<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardBanner extends Widget
{

    public function getColumnSpan(): int | string | array
    {
        return 2;
    }

    protected string $view = 'volt-livewire::filament.widgets.dashboard-banner';
}
