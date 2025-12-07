<?php

namespace App\Filament\Resources\ConsentFormCS\Pages;

use App\Filament\Resources\ConsentFormCS\ConsentFormCResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormC extends ViewRecord
{
    protected static string $resource = ConsentFormCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformc', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformc.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
