<?php

namespace App\Filament\Resources\ConsentFormES;

use App\Filament\Resources\ConsentFormES\Pages\CreateConsentFormE;
use App\Filament\Resources\ConsentFormES\Pages\EditConsentFormE;
use App\Filament\Resources\ConsentFormES\Pages\ListConsentFormES;
use App\Filament\Resources\ConsentFormES\Pages\ViewConsentFormE;
use App\Filament\Resources\ConsentFormES\Schemas\ConsentFormEForm;
use App\Filament\Resources\ConsentFormES\Schemas\ConsentFormEInfolist;
use App\Filament\Resources\ConsentFormES\Tables\ConsentFormESTable;
use App\Models\ConsentFormE;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormEResource extends Resource
{
    protected static ?string $model = ConsentFormE::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form E Social Media';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormEForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormEInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormESTable::configure($table);
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
            'index' => ListConsentFormES::route('/'),
            'create' => CreateConsentFormE::route('/create'),
            'view' => ViewConsentFormE::route('/{record}'),
            'edit' => EditConsentFormE::route('/{record}/edit'),
        ];
    }
}
