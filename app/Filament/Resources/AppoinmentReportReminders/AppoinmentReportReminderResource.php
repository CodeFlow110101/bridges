<?php

namespace App\Filament\Resources\AppoinmentReportReminders;

use App\Filament\Pages\Administration;
use App\Filament\Resources\AppoinmentReportReminders\Pages\CreateAppoinmentReportReminder;
use App\Filament\Resources\AppoinmentReportReminders\Pages\EditAppoinmentReportReminder;
use App\Filament\Resources\AppoinmentReportReminders\Pages\ListAppoinmentReportReminders;
use App\Filament\Resources\AppoinmentReportReminders\Pages\ViewAppoinmentReportReminder;
use App\Filament\Resources\AppoinmentReportReminders\Schemas\AppoinmentReportReminderForm;
use App\Filament\Resources\AppoinmentReportReminders\Schemas\AppoinmentReportReminderInfolist;
use App\Filament\Resources\AppoinmentReportReminders\Tables\AppoinmentReportRemindersTable;
use App\Models\AppoinmentReportReminder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AppoinmentReportReminderResource extends Resource
{
    protected static ?string $model = AppoinmentReportReminder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static ?string $parentPage = Administration::class;

    public static function form(Schema $schema): Schema
    {
        return AppoinmentReportReminderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AppoinmentReportReminderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AppoinmentReportRemindersTable::configure($table);
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
            'index' => ListAppoinmentReportReminders::route('/'),
            'create' => CreateAppoinmentReportReminder::route('/create'),
            'view' => ViewAppoinmentReportReminder::route('/{record}'),
            'edit' => EditAppoinmentReportReminder::route('/{record}/edit'),
        ];
    }
}
