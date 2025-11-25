<?php

namespace App\Filament\Resources\ConsentFormBS;

use App\Filament\Resources\ConsentFormBS\Pages\CreateConsentFormB;
use App\Filament\Resources\ConsentFormBS\Pages\EditConsentFormB;
use App\Filament\Resources\ConsentFormBS\Pages\ListConsentFormBS;
use App\Filament\Resources\ConsentFormBS\Pages\ViewConsentFormB;
use App\Filament\Resources\ConsentFormBS\Schemas\ConsentFormBForm;
use App\Filament\Resources\ConsentFormBS\Schemas\ConsentFormBInfolist;
use App\Filament\Resources\ConsentFormBS\Tables\ConsentFormBSTable;
use App\Models\ConsentFormB;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConsentFormBResource extends Resource
{
    protected static ?string $model = ConsentFormB::class;

    protected static string | UnitEnum | null $navigationGroup = 'Consent';

    protected static ?string $modelLabel = 'Form B';

    protected static ?string $pluralModelLabel = 'Form B';

    public static function form(Schema $schema): Schema
    {
        return ConsentFormBForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsentFormBInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsentFormBSTable::configure($table);
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
            'index' => ListConsentFormBS::route('/'),
            'create' => CreateConsentFormB::route('/create'),
            'view' => ViewConsentFormB::route('/{record}'),
            'edit' => EditConsentFormB::route('/{record}/edit'),
        ];
    }
}
