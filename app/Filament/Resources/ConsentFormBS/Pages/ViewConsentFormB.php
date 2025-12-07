<?php

namespace App\Filament\Resources\ConsentFormBS\Pages;

use App\Filament\Resources\ConsentFormBS\ConsentFormBResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsentFormB extends ViewRecord
{
    protected static string $resource = ConsentFormBResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.consentformb', [
                        'record' => $record,
                    ]);

                    $fileName = 'consentformb.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
