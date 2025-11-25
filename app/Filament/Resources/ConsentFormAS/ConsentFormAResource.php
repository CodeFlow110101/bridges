<?php

namespace App\Filament\Resources\ConsentFormAS;

use App\Filament\Resources\ConsentFormAS\Pages\CreateConsentFormA;
use App\Filament\Resources\ConsentFormAS\Pages\EditConsentFormA;
use App\Filament\Resources\ConsentFormAS\Pages\ListConsentFormAS;
use App\Filament\Resources\ConsentFormAS\Pages\ViewConsentFormA;
use App\Filament\Resources\ConsentFormAS\Schemas\ConsentFormAForm;
use App\Filament\Resources\ConsentFormAS\Schemas\ConsentFormAInfolist;
use App\Filament\Resources\ConsentFormAS\Tables\ConsentFormASTable;
use App\Models\ConsentFormA;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormAResource extends Resource
{
    protected static ?string $model = ConsentFormA::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form A';

    protected static ?string $pluralModelLabel = 'Form A';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormAForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormAInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormASTable::configure($table);
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
            'index' => ListConsentFormAS::route('/'),
            'create' => CreateConsentFormA::route('/create'),
            'view' => ViewConsentFormA::route('/{record}'),
            'edit' => EditConsentFormA::route('/{record}/edit'),
        ];
    }
}
