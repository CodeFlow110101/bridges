<?php

namespace App\Filament\Resources\InductionPrograms\Schemas;

use App\Models\InductionProgram;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Text;
use Filament\Support\Enums\TextSize;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class InductionProgramForm
{

    public $selected_user;

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship(name: 'user')
                    ->live()
                    ->native(false)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->first_name} {$record->last_name} ({$record->staff_id}) (Dept: {$record->department?->name})")
                    ->afterStateUpdated(function ($state, $set) {
                        $set('selected_user', User::find($state));
                    }),

                TextInput::make('job_title'),
                Text::make("This is a checklist of information for Induction which HR Officer/supervisors should use with new staff as part of their induction programme within the first two weeks of employment. Health and Safety measures will be identified at immediately. The new employee should be asked to tick each subject as he/she has been informed about it, and sign the end of the form. The HR /supervisor then keeps the form for inclusion in the employee’s personnel file."),
                Section::make("Items to Cover with Each New Employee")
                    ->schema(
                        collect(InductionProgram::$questionMap)->map(function ($fields, $type) {
                            return Section::make(Str::headline($type))
                                ->collapsible()
                                ->collapsed(true)
                                ->schema(
                                    collect($fields)->map(function ($field, $column) {
                                        return Toggle::make($column)
                                            ->label($field)
                                            ->default(false);
                                    })->all()
                                );
                        })->all()
                    ),
                Section::make("Employee’s Declaration")
                    ->schema([
                        Text::make("I have been informed about and understand the above items."),
                        Text::make(fn($get) => "Employee Name: " . $get('selected_user')?->fullname),
                        SignaturePad::make('signature')->dotSize(2.0)
                            ->lineMinWidth(0.5)
                            ->lineMaxWidth(2.5)
                            ->throttle(16)
                            ->minDistance(5)
                            ->velocityFilterWeight(0.7)
                            ->backgroundColor('rgba(255, 255, 255, 1)')
                            ->penColor('#000000')
                            ->penColorOnDark('#000000'),
                        DatePicker::make("date")->native(false),
                        Text::make('I confirm that the above Induction Programme has been completed for the above member of staff.'),
                        TextInput::make("hr_name")->label("HR / Clinic Manager Name")->live(onBlur: true),
                        SignaturePad::make('hr_signature')->dotSize(2.0)
                            ->lineMinWidth(0.5)
                            ->lineMaxWidth(2.5)
                            ->throttle(16)
                            ->minDistance(5)
                            ->velocityFilterWeight(0.7)
                            ->backgroundColor('rgba(255, 255, 255, 1)')
                            ->penColor('#000000')
                            ->penColorOnDark('#000000'),
                        DatePicker::make("hr_date")->native(false),
                    ]),
                Section::make("Staff Induction Document")
                    ->schema([
                        Text::make(fn($get) => 'I, ' . $get('selected_user')?->fullname . ' acknowledge that I have received guidance and understood staff induction program the provided by ' . $get('hr_name') . '.  I understand the policies, procedures, and terms and conditions outlined during induction and agree to abide by them during my employment with'),
                        Text::make("By signing this form, I confirm that I have understood and agree to comply with all the guidelines and requirements set forth in the staff induction program."),
                    ]),
                Text::make("Bridges Speech Center LLC")->size(TextSize::Large),
                Section::make("First Party")
                    ->schema([
                        TextInput::make("first_party_name")->label("Name"),
                        TextInput::make("first_party_position")->label("Position"),
                        SignaturePad::make('first_party_signature')->label("Signature")
                            ->dotSize(2.0)
                            ->lineMinWidth(0.5)
                            ->lineMaxWidth(2.5)
                            ->throttle(16)
                            ->minDistance(5)
                            ->velocityFilterWeight(0.7)
                            ->backgroundColor('rgba(255, 255, 255, 1)')
                            ->penColor('#000000')
                            ->penColorOnDark('#000000'),
                    ]),
                Text::make("Bridges Speech Center LLC")->size(TextSize::Large),
                Section::make("Second Party")
                    ->schema([
                        TextInput::make("second_party_name")->label("Name"),
                        TextInput::make("second_party_passport_number")->label("Passport Number"),
                        Textarea::make("second_party_current_address")->label("Current Address"),
                        DatePicker::make("second_party_date")->label("Date")->native(false),
                    ]),
            ])->columns(1);
    }
}
