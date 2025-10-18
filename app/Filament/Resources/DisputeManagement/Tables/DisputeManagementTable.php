<?php

namespace App\Filament\Resources\DisputeManagement\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DisputeManagementTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.staff_id')->label("Staff Id"),
                TextColumn::make('user.fullname')->label("Full Name"),
                TextColumn::make('user.department.name')->label("Department Name"),
                TextColumn::make('date')->label("Date of Issue")->date('d M Y'),
                TextColumn::make('response_date')->date('d M Y'),
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
