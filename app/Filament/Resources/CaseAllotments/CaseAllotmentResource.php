<?php

namespace App\Filament\Resources\CaseAllotments;

use App\Filament\Resources\CaseAllotments\Pages\CreateCaseAllotment;
use App\Filament\Resources\CaseAllotments\Pages\EditCaseAllotment;
use App\Filament\Resources\CaseAllotments\Pages\ListCaseAllotments;
use App\Filament\Resources\CaseAllotments\Pages\ViewCaseAllotment;
use App\Filament\Resources\CaseAllotments\Schemas\CaseAllotmentForm;
use App\Filament\Resources\CaseAllotments\Schemas\CaseAllotmentInfolist;
use App\Filament\Resources\CaseAllotments\Tables\CaseAllotmentsTable;
use App\Models\CaseAllotment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CaseAllotmentResource extends Resource
{
    protected static ?string $model = CaseAllotment::class;

    protected static string | UnitEnum | null $navigationGroup = 'Clinical';

    public static function form(Schema $schema): Schema
    {
        return CaseAllotmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CaseAllotmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseAllotmentsTable::configure($table);
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
            'index' => ListCaseAllotments::route('/'),
            'create' => CreateCaseAllotment::route('/create'),
            'view' => ViewCaseAllotment::route('/{record}'),
            'edit' => EditCaseAllotment::route('/{record}/edit'),
        ];
    }
}
