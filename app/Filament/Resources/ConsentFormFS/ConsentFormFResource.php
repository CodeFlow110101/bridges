<?php

namespace App\Filament\Resources\ConsentFormFS;

use App\Filament\Resources\ConsentFormFS\Pages\CreateConsentFormF;
use App\Filament\Resources\ConsentFormFS\Pages\EditConsentFormF;
use App\Filament\Resources\ConsentFormFS\Pages\ListConsentFormFS;
use App\Filament\Resources\ConsentFormFS\Pages\ViewConsentFormF;
use App\Filament\Resources\ConsentFormFS\Schemas\ConsentFormFForm;
use App\Filament\Resources\ConsentFormFS\Schemas\ConsentFormFInfolist;
use App\Filament\Resources\ConsentFormFS\Tables\ConsentFormFSTable;
use App\Models\ConsentFormF;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormFResource extends Resource
{
    protected static ?string $model = ConsentFormF::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form F';

    protected static ?string $pluralModelLabel = 'Form F';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormFForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormFInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormFSTable::configure($table);
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
            'index' => ListConsentFormFS::route('/'),
            'create' => CreateConsentFormF::route('/create'),
            'view' => ViewConsentFormF::route('/{record}'),
            'edit' => EditConsentFormF::route('/{record}/edit'),
        ];
    }
}
