<?php

namespace App\Filament\Resources\MouMoas;

use App\Filament\Pages\Administration;
use App\Filament\Resources\MouMoas\Pages\CreateMouMoa;
use App\Filament\Resources\MouMoas\Pages\EditMouMoa;
use App\Filament\Resources\MouMoas\Pages\ListMouMoas;
use App\Filament\Resources\MouMoas\Pages\ViewMouMoa;
use App\Filament\Resources\MouMoas\Schemas\MouMoaForm;
use App\Filament\Resources\MouMoas\Schemas\MouMoaInfolist;
use App\Filament\Resources\MouMoas\Tables\MouMoasTable;
use App\Models\MouMoa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MouMoaResource extends Resource
{
    protected static ?string $model = MouMoa::class;

    protected static ?string $modelLabel = 'Mou / Moa';

    protected static ?string $pluralModelLabel = 'Mou / Moa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static ?string $parentPage = Administration::class;

    public static function form(Schema $schema): Schema
    {
        return MouMoaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MouMoaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MouMoasTable::configure($table);
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
            'index' => ListMouMoas::route('/'),
            'create' => CreateMouMoa::route('/create'),
            'view' => ViewMouMoa::route('/{record}'),
            'edit' => EditMouMoa::route('/{record}/edit'),
        ];
    }
}
