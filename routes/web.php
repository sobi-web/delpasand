<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('pdf/{program}' , [PdfController::class , 'show'])->name('pdf.show');
