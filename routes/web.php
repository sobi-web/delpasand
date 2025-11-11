<?php

use App\Http\Controllers\PdfController;
use App\Models\Programs\Program;
use Illuminate\Support\Facades\Route;


use Spatie\Browsershot\Browsershot;

Route::get('/test-browser', function () {
    Browsershot::url('https://google.com')
        ->setNodeBinary('/usr/local/bin/node')
        ->setOption(
            'executablePath',
            '/Users/sobi/.cache/puppeteer/chrome/mac_arm-142.0.7444.61/chrome-mac-arm64/Google Chrome for Testing.app/Contents/MacOS/Google Chrome for Testing'
        )
        ->setOption('args', ['--no-sandbox', '--disable-gpu', '--headless=new'])
        ->save(storage_path('app/public/test.png'));

    return '✅ Browsershot Test OK — check storage/app/public/test.png';
});
Route::get('/', function () {
    return redirect()->route('filament.admin.pages.dashboard');
});

Route::get('pdf/{program}' , [PdfController::class , 'export'])->name('pdf.show');
Route::get('pds/{program}' , [PdfController::class , 'download'])->name('pdf.download');


Route::get('/test/{id}' , function ($id){
    $program = Program::with('days.exercises.exercise')->findOrFail($id);


       return view('ProgramPdf' , ['program' => $program]);
});
