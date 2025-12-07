<?php

namespace App\Filament\Resources\ConsentFormES\Pages;

use App\Filament\Resources\ConsentFormES\ConsentFormEResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormE extends ViewRecord
{
    protected static string $resource = ConsentFormEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentforme', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentforme.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
