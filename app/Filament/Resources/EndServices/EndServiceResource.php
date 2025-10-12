<?php

namespace App\Filament\Resources\EndServices;

use App\Filament\Resources\EndServices\Pages\CreateEndService;
use App\Filament\Resources\EndServices\Pages\EditEndService;
use App\Filament\Resources\EndServices\Pages\ListEndServices;
use App\Filament\Resources\EndServices\Pages\ViewEndService;
use App\Filament\Resources\EndServices\Schemas\EndServiceForm;
use App\Filament\Resources\EndServices\Schemas\EndServiceInfolist;
use App\Filament\Resources\EndServices\Tables\EndServicesTable;
use App\Models\EndService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EndServiceResource extends Resource
{
    protected static ?string $model = EndService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return EndServiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EndServiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EndServicesTable::configure($table);
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
            'index' => ListEndServices::route('/'),
            // 'create' => CreateEndService::route('/create'),
            'view' => ViewEndService::route('/{record}'),
            'edit' => EditEndService::route('/{record}/edit'),
        ];
    }
}
