<?php

namespace App\Filament\Resources\ClientInterventions\Pages;

use App\Filament\Resources\ClientInterventions\ClientInterventionResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClientIntervention extends ViewRecord
{
    protected static string $resource = ClientInterventionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.clientintervention', [
                        'record' => $record,
                    ]);

                    $fileName = 'clientintervention.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
