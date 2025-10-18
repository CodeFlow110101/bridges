<?php

namespace App\Filament\Resources\WarningLetters;

use App\Filament\Resources\WarningLetters\Pages\CreateWarningLetter;
use App\Filament\Resources\WarningLetters\Pages\EditWarningLetter;
use App\Filament\Resources\WarningLetters\Pages\ListWarningLetters;
use App\Filament\Resources\WarningLetters\Pages\ViewWarningLetter;
use App\Filament\Resources\WarningLetters\Schemas\WarningLetterForm;
use App\Filament\Resources\WarningLetters\Schemas\WarningLetterInfolist;
use App\Filament\Resources\WarningLetters\Tables\WarningLettersTable;
use App\Models\WarningLetter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Pages\HumanResource as PagesHumanResource;

class WarningLetterResource extends Resource
{
    protected static ?string $model = WarningLetter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static ?string $parentPage = PagesHumanResource::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return WarningLetterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WarningLetterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WarningLettersTable::configure($table);
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
            'index' => ListWarningLetters::route('/'),
            'create' => CreateWarningLetter::route('/create'),
            'view' => ViewWarningLetter::route('/{record}'),
            'edit' => EditWarningLetter::route('/{record}/edit'),
        ];
    }
}
