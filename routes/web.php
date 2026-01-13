<?php

use App\Models\Handbook;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

// Route::redirect('/', '/login');
// routes/web.php
Route::get('/handbook/{record}', function ($record) {
    $record = Handbook::findOrFail($record);

    return Pdf::loadView('exports.pdf.handbook', [
        'record' => $record,
    ])->stream('handbook.pdf');
})->name('handbook.view');
