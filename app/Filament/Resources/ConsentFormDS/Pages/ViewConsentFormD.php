<?php

namespace App\Filament\Resources\ConsentFormDS\Pages;

use App\Filament\Resources\ConsentFormDS\ConsentFormDResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormD extends ViewRecord
{
    protected static string $resource = ConsentFormDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformd', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformd.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
