<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Supervisor extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'volt-livewire::filament.pages.supervisor';
}
