<?php

use App\Http\Controllers\PdfController;
use App\Models\Programs\Program;
use Illuminate\Support\Facades\Route;


use Spatie\Browsershot\Browsershot;

Route::get('/', function () {
    return redirect()->route('filament.admin.pages.dashboard');
});

Route::get('pdf/{program}' , [PdfController::class , 'export'])->name('pdf.show');
Route::get('pds/{program}' , [PdfController::class , 'download'])->name('pdf.download');


Route::get('/test/{id}' , function ($id){
    $program = Program::with('days.exercises.exercise')->findOrFail($id);


       return view('ProgramPdf' , ['program' => $program]);
});
