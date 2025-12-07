<?php

namespace App\Filament\Resources\ClinicalAssessments\Pages;

use App\Filament\Resources\ClinicalAssessments\ClinicalAssessmentResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClinicalAssessment extends ViewRecord
{
    protected static string $resource = ClinicalAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.clinicalassessment', [
                        'record' => $record,
                    ]);

                    $fileName = 'clinicalassessment.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
