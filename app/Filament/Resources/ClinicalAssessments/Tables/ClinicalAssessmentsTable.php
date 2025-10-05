<?php

namespace App\Filament\Resources\ClinicalAssessments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClinicalAssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inquiry_number')
                    ->searchable(),
                TextColumn::make('assess_name')
                    ->searchable(),
                TextColumn::make('referral_source')
                    ->searchable(),
                TextColumn::make('discussed')
                    ->searchable(),
                TextColumn::make('mother_msl')
                    ->searchable(),
                TextColumn::make('father_msl')
                    ->searchable(),
                TextColumn::make('caregiver_msl')
                    ->searchable(),
                TextColumn::make('whom_msl')
                    ->searchable(),
                TextColumn::make('caregiver_name')
                    ->searchable(),
                TextColumn::make('other_infomration')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
