<?php

use App\Http\Controllers\PdfController;
use App\Models\Programs\Program;
use Illuminate\Support\Facades\Route;


use Spatie\Browsershot\Browsershot;

Route::get('/', function () {
    return redirect()->route('filament.admin.pages.dashboard');
});

Route::get('pdf/{program}' , [PdfController::class , 'export'])->name('pdf.export');
Route::get('/pdf-view/{id}' , [PdfController::class , 'show'])->name('pdf.preview');
Route::get('/secure-check', function (\Illuminate\Http\Request $request) {
    return [
        'isSecure' => $request->isSecure(),
        'scheme'   => $request->getScheme(),
    ];
});
