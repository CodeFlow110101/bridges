<?php

namespace App\Filament\Resources\Enquiries\Pages;

use App\Filament\Resources\Enquiries\EnquiryResource;
use App\Models\Enquiry;
use Filament\Resources\Pages\CreateRecord;

class CreateEnquiry extends CreateRecord
{
    protected static string $resource = EnquiryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['inquiry_number'] = $this->generateUniqueInquiryNumber();
        $data['date'] = now();

        return $data;
    }

    private function generateUniqueInquiryNumber(): string
    {
        do {
            // Generate a random numeric inquiry number (e.g., 6-10 digits)
            $inquiryNumber = (string) random_int(100000, 9999999);

            // Check if this number already exists in the database
            $exists = Enquiry::where('inquiry_number', $inquiryNumber)->exists();
        } while ($exists);

        return $inquiryNumber;
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCreateAnotherFormAction()->label("Save & Create Another"),
            $this->getCancelFormAction(),
        ];
    }

    // $this->getCreateFormAction()
    //         ->formId('form'),
}
