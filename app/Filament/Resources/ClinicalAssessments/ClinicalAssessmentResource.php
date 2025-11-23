<?php

namespace App\Filament\Resources\ClinicalAssessments;

use App\Filament\Pages\Clinical;
use App\Filament\Resources\ClinicalAssessments\Pages\CreateClinicalAssessment;
use App\Filament\Resources\ClinicalAssessments\Pages\EditClinicalAssessment;
use App\Filament\Resources\ClinicalAssessments\Pages\ListClinicalAssessments;
use App\Filament\Resources\ClinicalAssessments\Pages\ViewClinicalAssessment;
use App\Filament\Resources\ClinicalAssessments\Schemas\ClinicalAssessmentForm;
use App\Filament\Resources\ClinicalAssessments\Schemas\ClinicalAssessmentInfolist;
use App\Filament\Resources\ClinicalAssessments\Tables\ClinicalAssessmentsTable;
use App\Models\ClinicalAssessment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ClinicalAssessmentResource extends Resource
{
    protected static ?string $model = ClinicalAssessment::class;

    protected static string | UnitEnum | null $navigationGroup = 'Clinical';

    public static function form(Schema $schema): Schema
    {
        return ClinicalAssessmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClinicalAssessmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClinicalAssessmentsTable::configure($table);
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
            'index' => ListClinicalAssessments::route('/'),
            'create' => CreateClinicalAssessment::route('/create'),
            'view' => ViewClinicalAssessment::route('/{record}'),
            'edit' => EditClinicalAssessment::route('/{record}/edit'),
        ];
    }
}
