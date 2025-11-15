<?php

namespace App\Filament\Resources\EmployeeSalaries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeSalariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('company_name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('designation')
                    ->searchable(),
                TextColumn::make('joining_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('emergency_contact_details')
                    ->searchable(),
                TextColumn::make('pay_period')
                    ->date()
                    ->sortable(),
                TextColumn::make('basic_salary')
                    ->searchable(),
                TextColumn::make('hra')
                    ->searchable(),
                TextColumn::make('other_allowances')
                    ->searchable(),
                TextColumn::make('loss_of_pay_amount')
                    ->searchable(),
                TextColumn::make('total_earnings')
                    ->searchable(),
                TextColumn::make('total_advance_taken')
                    ->searchable(),
                TextColumn::make('total_advance_balance')
                    ->searchable(),
                TextColumn::make('final_salary')
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
