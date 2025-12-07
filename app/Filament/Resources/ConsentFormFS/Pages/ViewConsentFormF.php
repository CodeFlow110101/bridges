<?php

namespace App\Filament\Resources\ConsentFormFS\Pages;

use App\Filament\Resources\ConsentFormFS\ConsentFormFResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormF extends ViewRecord
{
    protected static string $resource = ConsentFormFResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformf', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformf.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
