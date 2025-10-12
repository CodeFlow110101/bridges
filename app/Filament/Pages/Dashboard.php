<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardBanner;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Facades\Filament;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;

class Dashboard extends BaseDashboard
{

    public function getColumns(): int | array
    {
        return ["sm" => 2, "max-sm" => 1];
    }

    public function getWidgetsContentComponent(): Component
    {
        $widgets = collect($this->getWidgets())
            ->prepend(DashboardBanner::class)
            ->unique();

        return Grid::make($this->getColumns())
            ->schema($this->getWidgetsSchemaComponents($widgets->all()));
    }
}
