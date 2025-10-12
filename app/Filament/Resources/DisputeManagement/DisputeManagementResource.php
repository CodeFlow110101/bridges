<?php

namespace App\Filament\Resources\DisputeManagement;

use App\Filament\Resources\DisputeManagement\Pages\CreateDisputeManagement;
use App\Filament\Resources\DisputeManagement\Pages\EditDisputeManagement;
use App\Filament\Resources\DisputeManagement\Pages\ListDisputeManagement;
use App\Filament\Resources\DisputeManagement\Pages\ViewDisputeManagement;
use App\Filament\Resources\DisputeManagement\Schemas\DisputeManagementForm;
use App\Filament\Resources\DisputeManagement\Schemas\DisputeManagementInfolist;
use App\Filament\Resources\DisputeManagement\Tables\DisputeManagementTable;
use App\Models\DisputeManagement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DisputeManagementResource extends Resource
{
    protected static ?string $model = DisputeManagement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return DisputeManagementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DisputeManagementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DisputeManagementTable::configure($table);
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
            'index' => ListDisputeManagement::route('/'),
            'create' => CreateDisputeManagement::route('/create'),
            'view' => ViewDisputeManagement::route('/{record}'),
            'edit' => EditDisputeManagement::route('/{record}/edit'),
        ];
    }
}
