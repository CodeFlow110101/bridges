<?php

namespace App\Filament\Resources\KeyPerformanceIndicators\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KeyPerformanceIndicatorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.staff_id')->label("Staff Id"),
                TextColumn::make('user.fullname')->label("Full Name"),
                TextColumn::make('user.department.name')->label("Department Name"),
                TextColumn::make('evaluation_period')->label("Department Name"),
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
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
