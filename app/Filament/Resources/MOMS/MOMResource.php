<?php

namespace App\Filament\Resources\MOMS;

use App\Filament\Resources\MOMS\Pages\CreateMOM;
use App\Filament\Resources\MOMS\Pages\EditMOM;
use App\Filament\Resources\MOMS\Pages\ListMOMS;
use App\Filament\Resources\MOMS\Pages\ViewMOM;
use App\Filament\Resources\MOMS\Schemas\MOMForm;
use App\Filament\Resources\MOMS\Schemas\MOMInfolist;
use App\Filament\Resources\MOMS\Tables\MOMSTable;
use App\Models\MOM;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MOMResource extends Resource
{
    protected static ?string $model = MOM::class;

    protected static ?string $modelLabel = 'MOM';

    protected static ?string $pluralModelLabel = 'MOM';

    protected static string | UnitEnum | null $navigationGroup = 'Clinical';

    public static function form(Schema $schema): Schema
    {
        return MOMForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MOMInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MOMSTable::configure($table);
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
            'index' => ListMOMS::route('/'),
            'create' => CreateMOM::route('/create'),
            'view' => ViewMOM::route('/{record}'),
            'edit' => EditMOM::route('/{record}/edit'),
        ];
    }
}
