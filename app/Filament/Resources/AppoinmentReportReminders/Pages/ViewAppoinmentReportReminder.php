<?php

namespace App\Filament\Resources\AppoinmentReportReminders\Pages;

use App\Filament\Resources\AppoinmentReportReminders\AppoinmentReportReminderResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAppoinmentReportReminder extends ViewRecord
{
    protected static string $resource = AppoinmentReportReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.appoinmentreportreminder', [
                        'record' => $record,
                    ]);

                    $fileName = 'appoinmentreportreminder.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
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
