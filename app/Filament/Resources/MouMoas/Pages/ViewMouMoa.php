<?php

namespace App\Filament\Resources\MouMoas\Pages;

use App\Filament\Resources\MouMoas\MouMoaResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMouMoa extends ViewRecord
{
    protected static string $resource = MouMoaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.moumoa', [
                        'record' => $record,
                    ]);

                    $fileName = 'moumoa.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
