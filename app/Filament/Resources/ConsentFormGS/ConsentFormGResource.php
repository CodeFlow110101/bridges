<?php

namespace App\Filament\Resources\ConsentFormGS;

use App\Filament\Resources\ConsentFormGS\Pages\CreateConsentFormG;
use App\Filament\Resources\ConsentFormGS\Pages\EditConsentFormG;
use App\Filament\Resources\ConsentFormGS\Pages\ListConsentFormGS;
use App\Filament\Resources\ConsentFormGS\Pages\ViewConsentFormG;
use App\Filament\Resources\ConsentFormGS\Schemas\ConsentFormGForm;
use App\Filament\Resources\ConsentFormGS\Schemas\ConsentFormGInfolist;
use App\Filament\Resources\ConsentFormGS\Tables\ConsentFormGSTable;
use App\Models\ConsentFormG;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormGResource extends Resource
{
    protected static ?string $model = ConsentFormG::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form G Therapy Plan Approval';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormGForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormGInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormGSTable::configure($table);
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
            'index' => ListConsentFormGS::route('/'),
            'create' => CreateConsentFormG::route('/create'),
            'view' => ViewConsentFormG::route('/{record}'),
            'edit' => EditConsentFormG::route('/{record}/edit'),
        ];
    }
}
