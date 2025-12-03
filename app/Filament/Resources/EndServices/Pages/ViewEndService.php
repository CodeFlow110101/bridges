<?php

namespace App\Filament\Resources\EndServices\Pages;

use App\Filament\Resources\EndServices\EndServiceResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEndService extends ViewRecord
{
    protected static string $resource = EndServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.endservice', [
                        'record' => $record,
                    ]);

                    $fileName = 'endservice.pdf';

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
