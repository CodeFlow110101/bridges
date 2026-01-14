<?php

namespace App\Filament\Resources\StaffConfidentialityContracts\Pages;

use App\Filament\Resources\StaffConfidentialityContracts\StaffConfidentialityContractResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewStaffConfidentialityContract extends ViewRecord
{
    protected static string $resource = StaffConfidentialityContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('Download')
                ->action(function () {
                    $record = $this->record;
                    $pdf = Pdf::loadView('exports.pdf.staffconfidentialitycontract', [
                        'record' => $record,
                    ]);

                    $fileName = 'staffconfidentialitycontract.pdf';

                    $path = public_path($fileName);

                    $pdf->save($path);

                    return response()->download($path)->deleteFileAfterSend(true);
                })
        ];
    }

    function getBreadcrumbs(): array
    {
        return [
            self::$resource::$parentPage::getUrl() => self::$resource::$parentPage::getHeadingForPages(),
            ...$this->getResourceBreadcrumbs(),
            $this->getBreadcrumb(),
        ];
    }
}
