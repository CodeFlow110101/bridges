<?php

namespace App\Filament\Resources\ConsentFormHS\Pages;

use App\Filament\Resources\ConsentFormHS\ConsentFormHResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormH extends ViewRecord
{
    protected static string $resource = ConsentFormHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformh', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformh.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
