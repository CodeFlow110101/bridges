<?php

namespace App\Filament\Resources\WarningLetters\Pages;

use App\Filament\Resources\WarningLetters\WarningLetterResource;
use App\Mail\WarningLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Mail;

class ViewWarningLetter extends ViewRecord
{
    protected static string $resource = WarningLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.warningletter', [
                        'record' => $record,
                    ]);

                    $fileName = 'warningletter.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
            Action::make('Send Mail')
                ->action(function () {
                    Mail::to($this->record->user->email)->send(new WarningLetter($this->record));

                    Notification::make()
                        ->title('Sent successfully')
                        ->success()
                        ->send();
                })
        ];
    }

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
