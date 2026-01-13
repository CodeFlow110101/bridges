<?php

namespace App\Filament\Resources\Handbooks\Pages;

use App\Filament\Resources\Handbooks\HandbookResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHandbook extends ViewRecord
{
    protected static string $resource = HandbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.handbook', [
                        'record' => $record,
                    ]);

                    $fileName = 'handbook.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
            Action::make('View')
                ->url(fn() => route('handbook.view', $this->record->id))
                ->openUrlInNewTab()
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
