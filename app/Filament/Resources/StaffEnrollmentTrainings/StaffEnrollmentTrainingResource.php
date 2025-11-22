<?php

namespace App\Filament\Resources\StaffEnrollmentTrainings;

use App\Filament\Pages\Administration;
use App\Filament\Resources\StaffEnrollmentTrainings\Pages\CreateStaffEnrollmentTraining;
use App\Filament\Resources\StaffEnrollmentTrainings\Pages\EditStaffEnrollmentTraining;
use App\Filament\Resources\StaffEnrollmentTrainings\Pages\ListStaffEnrollmentTrainings;
use App\Filament\Resources\StaffEnrollmentTrainings\Pages\ViewStaffEnrollmentTraining;
use App\Filament\Resources\StaffEnrollmentTrainings\Schemas\StaffEnrollmentTrainingForm;
use App\Filament\Resources\StaffEnrollmentTrainings\Schemas\StaffEnrollmentTrainingInfolist;
use App\Filament\Resources\StaffEnrollmentTrainings\Tables\StaffEnrollmentTrainingsTable;
use App\Models\StaffEnrollmentTraining;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffEnrollmentTrainingResource extends Resource
{
    protected static ?string $model = StaffEnrollmentTraining::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static ?string $parentPage = Administration::class;

    public static function form(Schema $schema): Schema
    {
        return StaffEnrollmentTrainingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffEnrollmentTrainingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffEnrollmentTrainingsTable::configure($table);
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
            'index' => ListStaffEnrollmentTrainings::route('/'),
            'create' => CreateStaffEnrollmentTraining::route('/create'),
            'view' => ViewStaffEnrollmentTraining::route('/{record}'),
            'edit' => EditStaffEnrollmentTraining::route('/{record}/edit'),
        ];
    }
}
