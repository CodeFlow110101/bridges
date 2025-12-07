<?php

namespace App\Filament\Resources\ConsentFormAS\Pages;

use App\Filament\Resources\ConsentFormAS\ConsentFormAResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormA extends ViewRecord
{
    protected static string $resource = ConsentFormAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentforma', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentforma.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
