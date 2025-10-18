<?php

namespace App\Filament\Resources\Handbooks;

use App\Filament\Resources\Handbooks\Pages\CreateHandbook;
use App\Filament\Resources\Handbooks\Pages\EditHandbook;
use App\Filament\Resources\Handbooks\Pages\ListHandbooks;
use App\Filament\Resources\Handbooks\Pages\ViewHandbook;
use App\Filament\Resources\Handbooks\Schemas\HandbookForm;
use App\Filament\Resources\Handbooks\Schemas\HandbookInfolist;
use App\Filament\Resources\Handbooks\Tables\HandbooksTable;
use App\Models\Handbook;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Pages\HumanResource as PagesHumanResource;

class HandbookResource extends Resource
{
    protected static ?string $model = Handbook::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static ?string $parentPage = PagesHumanResource::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return HandbookForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HandbookInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HandbooksTable::configure($table);
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
            'index' => ListHandbooks::route('/'),
            'create' => CreateHandbook::route('/create'),
            'view' => ViewHandbook::route('/{record}'),
            'edit' => EditHandbook::route('/{record}/edit'),
        ];
    }
}
