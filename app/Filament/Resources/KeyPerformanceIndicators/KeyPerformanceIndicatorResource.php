<?php

namespace App\Filament\Resources\KeyPerformanceIndicators;

use App\Filament\Resources\KeyPerformanceIndicators\Pages\CreateKeyPerformanceIndicator;
use App\Filament\Resources\KeyPerformanceIndicators\Pages\EditKeyPerformanceIndicator;
use App\Filament\Resources\KeyPerformanceIndicators\Pages\ListKeyPerformanceIndicators;
use App\Filament\Resources\KeyPerformanceIndicators\Pages\ViewKeyPerformanceIndicator;
use App\Filament\Resources\KeyPerformanceIndicators\Schemas\KeyPerformanceIndicatorForm;
use App\Filament\Resources\KeyPerformanceIndicators\Schemas\KeyPerformanceIndicatorInfolist;
use App\Filament\Resources\KeyPerformanceIndicators\Tables\KeyPerformanceIndicatorsTable;
use App\Models\KeyPerformanceIndicator;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KeyPerformanceIndicatorResource extends Resource
{
    protected static ?string $model = KeyPerformanceIndicator::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return KeyPerformanceIndicatorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KeyPerformanceIndicatorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeyPerformanceIndicatorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKeyPerformanceIndicators::route('/'),
            'create' => CreateKeyPerformanceIndicator::route('/create'),
            'view' => ViewKeyPerformanceIndicator::route('/{record}'),
            'edit' => EditKeyPerformanceIndicator::route('/{record}/edit'),
        ];
    }
}
