<?php

namespace App\Filament\Resources\InductionPrograms;

use App\Filament\Resources\InductionPrograms\Pages\CreateInductionProgram;
use App\Filament\Resources\InductionPrograms\Pages\EditInductionProgram;
use App\Filament\Resources\InductionPrograms\Pages\ListInductionPrograms;
use App\Filament\Resources\InductionPrograms\Pages\ViewInductionProgram;
use App\Filament\Resources\InductionPrograms\Schemas\InductionProgramForm;
use App\Filament\Resources\InductionPrograms\Schemas\InductionProgramInfolist;
use App\Filament\Resources\InductionPrograms\Tables\InductionProgramsTable;
use App\Models\InductionProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InductionProgramResource extends Resource
{
    protected static ?string $model = InductionProgram::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return InductionProgramForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InductionProgramInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InductionProgramsTable::configure($table);
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
            'index' => ListInductionPrograms::route('/'),
            'create' => CreateInductionProgram::route('/create'),
            'view' => ViewInductionProgram::route('/{record}'),
            'edit' => EditInductionProgram::route('/{record}/edit'),
        ];
    }
}
