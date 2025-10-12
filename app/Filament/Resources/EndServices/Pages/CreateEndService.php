<?php

namespace App\Filament\Resources\EndServices\Pages;

use App\Filament\Resources\EndServices\EndServiceResource;
use App\Models\EndServiceQuestion;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEndService extends CreateRecord
{
    protected static string $resource = EndServiceResource::class;
}
