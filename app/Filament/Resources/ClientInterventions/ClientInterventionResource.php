<?php

namespace App\Filament\Resources\ClientInterventions;

use App\Filament\Resources\ClientInterventions\Pages\CreateClientIntervention;
use App\Filament\Resources\ClientInterventions\Pages\EditClientIntervention;
use App\Filament\Resources\ClientInterventions\Pages\ListClientInterventions;
use App\Filament\Resources\ClientInterventions\Pages\ViewClientIntervention;
use App\Filament\Resources\ClientInterventions\Schemas\ClientInterventionForm;
use App\Filament\Resources\ClientInterventions\Schemas\ClientInterventionInfolist;
use App\Filament\Resources\ClientInterventions\Tables\ClientInterventionsTable;
use App\Models\ClientIntervention;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ClientInterventionResource extends Resource
{
    protected static ?string $model = ClientIntervention::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static string | UnitEnum | null $navigationGroup = 'Clinical';

    public static function form(Schema $schema): Schema
    {
        return ClientInterventionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClientInterventionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientInterventionsTable::configure($table);
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
            'index' => ListClientInterventions::route('/'),
            'create' => CreateClientIntervention::route('/create'),
            'view' => ViewClientIntervention::route('/{record}'),
            'edit' => EditClientIntervention::route('/{record}/edit'),
        ];
    }
}
