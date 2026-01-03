<?php

namespace App\Filament\Resources\DisputeManagement\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class DisputeManagementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})"),
                DatePicker::make('date')->native(false)->required(),
                Textarea::make("concern"),
                Grid::make()->schema([
                    TextInput::make("email_to_forward"),
                    DatePicker::make('addressed_date')->native(false),
                    DatePicker::make('response_date')->native(false),
                    TextInput::make("responded_by"),
                ]),
                Textarea::make("conclusion"),
            ])->columns(1);
    }
}
