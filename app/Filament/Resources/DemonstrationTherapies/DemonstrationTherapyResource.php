<?php

namespace App\Filament\Resources\DemonstrationTherapies;

use App\Filament\Resources\DemonstrationTherapies\Pages\CreateDemonstrationTherapy;
use App\Filament\Resources\DemonstrationTherapies\Pages\EditDemonstrationTherapy;
use App\Filament\Resources\DemonstrationTherapies\Pages\ListDemonstrationTherapies;
use App\Filament\Resources\DemonstrationTherapies\Pages\ViewDemonstrationTherapy;
use App\Filament\Resources\DemonstrationTherapies\Schemas\DemonstrationTherapyForm;
use App\Filament\Resources\DemonstrationTherapies\Schemas\DemonstrationTherapyInfolist;
use App\Filament\Resources\DemonstrationTherapies\Tables\DemonstrationTherapiesTable;
use App\Models\DemonstrationTherapy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DemonstrationTherapyResource extends Resource
{
    protected static ?string $model = DemonstrationTherapy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DemonstrationTherapyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DemonstrationTherapyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DemonstrationTherapiesTable::configure($table);
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
            'index' => ListDemonstrationTherapies::route('/'),
            'create' => CreateDemonstrationTherapy::route('/create'),
            'view' => ViewDemonstrationTherapy::route('/{record}'),
            'edit' => EditDemonstrationTherapy::route('/{record}/edit'),
        ];
    }
}
