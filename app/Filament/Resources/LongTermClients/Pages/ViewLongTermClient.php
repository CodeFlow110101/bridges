<?php

namespace App\Filament\Resources\LongTermClients\Pages;

use App\Filament\Resources\LongTermClients\LongTermClientResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLongTermClient extends ViewRecord
{
    protected static string $resource = LongTermClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.longtermclient', [
                        'record' => $record,
                    ]);

                    $fileName = 'longtermclient.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                }),
        ];
    }
}
