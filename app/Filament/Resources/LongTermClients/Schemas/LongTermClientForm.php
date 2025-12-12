<?php

namespace App\Filament\Resources\LongTermClients\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LongTermClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('inquiry_id')
                    ->label("Inquiry Number")
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->relationship(name: 'enquiry', titleAttribute: 'inquiry_number'),
                TextInput::make('client_name')
                    ->required(),
                FileUpload::make('client_letter_of_discount')->directory('files')->label("Upload Client's letter of discount"),
                FileUpload::make('reply_from_clinical_manager')->directory('files')->label("Reply from Clinical Manager"),
                DatePicker::make('email_recieved_from_parent_date')->label("Date when email from parent received")->native(false),
                DatePicker::make('date_when_email_replied')->label("Date when email replied by clinic manager")->native(false),
                DatePicker::make('email_date_from_forwarded')->label("Email date through which it was forwarded")->native(false),
                Textarea::make('email_address_forwarded_through')->label("Email address through which it was forwarded")
                    ->columnSpanFull(),
                Textarea::make('conditions_discovered')->label("Brief on conditions discussed")
                    ->columnSpanFull(),
                TextInput::make('cheque_no')->label("cheque_number"),
                TextInput::make('cost_on_cheque')->label("Cost mentioned on cheque"),
                TextInput::make('contract_no_of_months')->label("Number of months contract"),
                TextInput::make('alert_to_generate_on')->label("Alert to generate on"),
            ]);
    }
}
