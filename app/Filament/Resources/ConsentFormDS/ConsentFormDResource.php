<?php

namespace App\Filament\Resources\ConsentFormDS;

use App\Filament\Resources\ConsentFormDS\Pages\CreateConsentFormD;
use App\Filament\Resources\ConsentFormDS\Pages\EditConsentFormD;
use App\Filament\Resources\ConsentFormDS\Pages\ListConsentFormDS;
use App\Filament\Resources\ConsentFormDS\Pages\ViewConsentFormD;
use App\Filament\Resources\ConsentFormDS\Schemas\ConsentFormDForm;
use App\Filament\Resources\ConsentFormDS\Schemas\ConsentFormDInfolist;
use App\Filament\Resources\ConsentFormDS\Tables\ConsentFormDSTable;
use App\Models\ConsentFormD;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormDResource extends Resource
{
    protected static ?string $model = ConsentFormD::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form D';

    protected static ?string $pluralModelLabel = 'Form D';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormDForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormDInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormDSTable::configure($table);
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
            'index' => ListConsentFormDS::route('/'),
            'create' => CreateConsentFormD::route('/create'),
            'view' => ViewConsentFormD::route('/{record}'),
            'edit' => EditConsentFormD::route('/{record}/edit'),
        ];
    }
}
