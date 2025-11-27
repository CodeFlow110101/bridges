<?php

namespace App\Filament\Resources\ConsentFormHS;

use App\Filament\Resources\ConsentFormHS\Pages\CreateConsentFormH;
use App\Filament\Resources\ConsentFormHS\Pages\EditConsentFormH;
use App\Filament\Resources\ConsentFormHS\Pages\ListConsentFormHS;
use App\Filament\Resources\ConsentFormHS\Pages\ViewConsentFormH;
use App\Filament\Resources\ConsentFormHS\Schemas\ConsentFormHForm;
use App\Filament\Resources\ConsentFormHS\Schemas\ConsentFormHInfolist;
use App\Filament\Resources\ConsentFormHS\Tables\ConsentFormHSTable;
use App\Models\ConsentFormH;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormHResource extends Resource
{
    protected static ?string $model = ConsentFormH::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form H';

    protected static ?string $pluralModelLabel = 'Form H';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormHForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormHInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormHSTable::configure($table);
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
            'index' => ListConsentFormHS::route('/'),
            'create' => CreateConsentFormH::route('/create'),
            'view' => ViewConsentFormH::route('/{record}'),
            'edit' => EditConsentFormH::route('/{record}/edit'),
        ];
    }
}
