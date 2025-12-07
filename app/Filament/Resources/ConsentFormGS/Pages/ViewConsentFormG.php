<?php

namespace App\Filament\Resources\ConsentFormGS\Pages;

use App\Filament\Resources\ConsentFormGS\ConsentFormGResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormG extends ViewRecord
{
    protected static string $resource = ConsentFormGResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformg', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformg.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
