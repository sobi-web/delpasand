<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('pdf/{program}' , [PdfController::class , 'export'])->name('pdf.show');
Route::get('pds/{program}' , [PdfController::class , 'download'])->name('pdf.download');


Route::get('/test' , function (){
   return view('ProgramPdf');
});
