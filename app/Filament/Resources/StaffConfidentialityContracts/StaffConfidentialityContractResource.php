<?php

namespace App\Filament\Resources\StaffConfidentialityContracts;

use App\Filament\Resources\StaffConfidentialityContracts\Pages\CreateStaffConfidentialityContract;
use App\Filament\Resources\StaffConfidentialityContracts\Pages\EditStaffConfidentialityContract;
use App\Filament\Resources\StaffConfidentialityContracts\Pages\ListStaffConfidentialityContracts;
use App\Filament\Resources\StaffConfidentialityContracts\Pages\ViewStaffConfidentialityContract;
use App\Filament\Resources\StaffConfidentialityContracts\Schemas\StaffConfidentialityContractForm;
use App\Filament\Resources\StaffConfidentialityContracts\Schemas\StaffConfidentialityContractInfolist;
use App\Filament\Resources\StaffConfidentialityContracts\Tables\StaffConfidentialityContractsTable;
use App\Models\StaffConfidentialityContract;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Pages\HumanResource as PagesHumanResource;

class StaffConfidentialityContractResource extends Resource
{
    protected static ?string $model = StaffConfidentialityContract::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static ?string $parentPage = PagesHumanResource::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return StaffConfidentialityContractForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffConfidentialityContractInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffConfidentialityContractsTable::configure($table);
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
            'index' => ListStaffConfidentialityContracts::route('/'),
            'create' => CreateStaffConfidentialityContract::route('/create'),
            'view' => ViewStaffConfidentialityContract::route('/{record}'),
            'edit' => EditStaffConfidentialityContract::route('/{record}/edit'),
        ];
    }
}
