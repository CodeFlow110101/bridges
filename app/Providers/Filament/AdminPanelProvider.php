<?php

namespace App\Providers\Filament;

use App\Filament\Pages\HumanResource;
use App\Filament\Resources\DisputeManagement\DisputeManagementResource;
use App\Filament\Resources\EndServices\EndServiceResource;
use App\Filament\Resources\InductionPrograms\InductionProgramResource;
use App\Filament\Resources\KeyPerformanceIndicators\KeyPerformanceIndicatorResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\WarningLetters\WarningLetterResource;
use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Support\Assets\Js;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandLogoHeight('5rem')
            ->viteTheme(['resources/css/filament/admin/theme.css', "resources/js/app.js"])
            ->brandLogo(asset('images/logo.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->assets([
                Js::make('custom-script', asset('js/alpine.js')),
            ])
            ->colors([
                'primary' => Color::generateV3Palette("#2c4099"),
            ])
            ->spa()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Clinical Management')
            ])
            ->navigationItems([
                NavigationItem::make('Human Resource')
                    ->label(fn(): string => HumanResource::getNavigationLabel())
                    ->url(fn(): string => HumanResource::getUrl())
                    ->group('Clinical Management')
                    ->isActiveWhen(function () {
                        $routes = collect([UserResource::class, EndServiceResource::class, WarningLetterResource::class, DisputeManagementResource::class, KeyPerformanceIndicatorResource::class, InductionProgramResource::class])
                            ->map(function ($resource) {
                                return collect($resource::getPages())->map(function ($page) {
                                    return collect($page)->first()::getNavigationItemActiveRoutePattern();
                                })->values();
                            })->flatten()->push("filament.admin.pages.human-resource");

                        return collect($routes)->contains(fn($route) => request()->routeIs($route));
                    }),
            ]);
    }
}
