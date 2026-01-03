<?php

namespace App\Filament\Exports;

use App\Models\DisputeManagement;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class DisputeManagementExporter extends Exporter
{
    protected static ?string $model = DisputeManagement::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.fullname')->label('Full Name'),
            ExportColumn::make('user.staff_id')->label('Staff Id'),
            ExportColumn::make('user.department.name')->label('Department Name'),
            ExportColumn::make('date'),
            ExportColumn::make('concern'),
            ExportColumn::make('email_to_forward'),
            ExportColumn::make('addressed_date'),
            ExportColumn::make('response_date'),
            ExportColumn::make('responded_by'),
            ExportColumn::make('conclusion'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your dispute management export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
