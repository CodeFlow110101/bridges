<?php

namespace App\Filament\Resources\CaseAllotments\Pages;

use App\Filament\Resources\CaseAllotments\CaseAllotmentResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCaseAllotment extends ViewRecord
{
    protected static string $resource = CaseAllotmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.caseallotment', [
                        'record' => $record,
                    ]);

                    $fileName = 'caseallotment.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
