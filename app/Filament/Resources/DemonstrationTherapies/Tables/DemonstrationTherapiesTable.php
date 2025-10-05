<?php

namespace App\Filament\Resources\DemonstrationTherapies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DemonstrationTherapiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inquiry_number')
                    ->searchable(),
                TextColumn::make('session_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
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
