<?php

namespace App\Filament\Resources\DemonstrationTherapies\Pages;

use App\Filament\Resources\DemonstrationTherapies\DemonstrationTherapyResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDemonstrationTherapy extends ViewRecord
{
    protected static string $resource = DemonstrationTherapyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.demonstrationtherapy', [
                        'record' => $record,
                    ]);

                    $fileName = 'demonstrationtherapy.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
