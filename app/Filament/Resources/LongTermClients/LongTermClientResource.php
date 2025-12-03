<?php

namespace App\Filament\Resources\LongTermClients;

use App\Filament\Pages\Administration;
use App\Filament\Resources\LongTermClients\Pages\CreateLongTermClient;
use App\Filament\Resources\LongTermClients\Pages\EditLongTermClient;
use App\Filament\Resources\LongTermClients\Pages\ListLongTermClients;
use App\Filament\Resources\LongTermClients\Pages\ViewLongTermClient;
use App\Filament\Resources\LongTermClients\Schemas\LongTermClientForm;
use App\Filament\Resources\LongTermClients\Schemas\LongTermClientInfolist;
use App\Filament\Resources\LongTermClients\Tables\LongTermClientsTable;
use App\Models\LongTermClient;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LongTermClientResource extends Resource
{
    protected static ?string $model = LongTermClient::class;

    protected static bool $shouldRegisterNavigation = false;

    public static ?string $parentPage = Administration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LongTermClientForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LongTermClientInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LongTermClientsTable::configure($table);
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
            'index' => ListLongTermClients::route('/'),
            'create' => CreateLongTermClient::route('/create'),
            'view' => ViewLongTermClient::route('/{record}'),
            'edit' => EditLongTermClient::route('/{record}/edit'),
        ];
    }
}
