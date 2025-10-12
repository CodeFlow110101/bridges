<?php

namespace App\Livewire;

use App\Models\DisputeManagement;
use App\Models\EndService;
use App\Models\KeyPerformanceIndicator;
use App\Models\User;
use App\Models\WarningLetter;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Str;

class Resource extends StatsOverviewWidget
{

    public $classes;

    protected function getColumns(): int | array | null
    {
        return 3;
    }

    protected function getStats(): array
    {
        return collect($this->classes)->map(fn($class) => Stat::make(Str::headline($class::getModelLabel()), $class::getModel()::count())->extraAttributes([
            'class' => 'cursor-pointer',
            'wire:click' => "redirectToResource('" . $class::getUrl("index") . "')",
        ]))->all();
    }

    public function mount($classes)
    {
        $this->classes = $classes;
    }

    public function redirectToResource($path)
    {
        $this->redirect($path, navigate: true);
    }
}
