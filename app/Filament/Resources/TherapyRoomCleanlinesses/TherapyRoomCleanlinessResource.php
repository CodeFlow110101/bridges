<?php

namespace App\Filament\Resources\TherapyRoomCleanlinesses;

use App\Filament\Pages\Staff;
use App\Filament\Resources\TherapyRoomCleanlinesses\Pages\CreateTherapyRoomCleanliness;
use App\Filament\Resources\TherapyRoomCleanlinesses\Pages\EditTherapyRoomCleanliness;
use App\Filament\Resources\TherapyRoomCleanlinesses\Pages\ListTherapyRoomCleanlinesses;
use App\Filament\Resources\TherapyRoomCleanlinesses\Pages\ViewTherapyRoomCleanliness;
use App\Filament\Resources\TherapyRoomCleanlinesses\Schemas\TherapyRoomCleanlinessForm;
use App\Filament\Resources\TherapyRoomCleanlinesses\Schemas\TherapyRoomCleanlinessInfolist;
use App\Filament\Resources\TherapyRoomCleanlinesses\Tables\TherapyRoomCleanlinessesTable;
use App\Models\TherapyRoomCleanliness;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TherapyRoomCleanlinessResource extends Resource
{
    protected static ?string $model = TherapyRoomCleanliness::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static ?string $parentPage = Staff::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return TherapyRoomCleanlinessForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TherapyRoomCleanlinessInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TherapyRoomCleanlinessesTable::configure($table);
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
            'index' => ListTherapyRoomCleanlinesses::route('/'),
            'create' => CreateTherapyRoomCleanliness::route('/create'),
            'view' => ViewTherapyRoomCleanliness::route('/{record}'),
            'edit' => EditTherapyRoomCleanliness::route('/{record}/edit'),
        ];
    }
}
