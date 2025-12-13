<?php

namespace App\Filament\Resources\Invoices\Pages;

use App\Filament\Resources\Invoices\InvoiceResource;
use App\Models\Invoice;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['invoice_number'] = $this->generateUniqueInquiryNumber();

        return $data;
    }

    private function generateUniqueInquiryNumber(): string
    {
        do {
            // Generate a random numeric inquiry number (e.g., 6-10 digits)
            $inquiryNumber = (string) random_int(100000, 9999999);

            // Check if this number already exists in the database
            $exists = Invoice::where('invoice_number', $inquiryNumber)->exists();
        } while ($exists);

        return $inquiryNumber;
    }
}
