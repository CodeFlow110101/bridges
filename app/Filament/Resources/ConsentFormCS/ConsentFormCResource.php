<?php

namespace App\Filament\Resources\ConsentFormCS;

use App\Filament\Resources\ConsentFormCS\Pages\CreateConsentFormC;
use App\Filament\Resources\ConsentFormCS\Pages\EditConsentFormC;
use App\Filament\Resources\ConsentFormCS\Pages\ListConsentFormCS;
use App\Filament\Resources\ConsentFormCS\Pages\ViewConsentFormC;
use App\Filament\Resources\ConsentFormCS\Schemas\ConsentFormCForm;
use App\Filament\Resources\ConsentFormCS\Schemas\ConsentFormCInfolist;
use App\Filament\Resources\ConsentFormCS\Tables\ConsentFormCSTable;
use App\Models\ConsentFormC;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormCResource extends Resource
{
    protected static ?string $model = ConsentFormC::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form C Eletronic Ttransfer';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormCForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormCInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormCSTable::configure($table);
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
            'index' => ListConsentFormCS::route('/'),
            'create' => CreateConsentFormC::route('/create'),
            'view' => ViewConsentFormC::route('/{record}'),
            'edit' => EditConsentFormC::route('/{record}/edit'),
        ];
    }
}
