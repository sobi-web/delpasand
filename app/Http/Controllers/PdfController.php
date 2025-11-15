<?php

namespace App\Http\Controllers;

use App\Models\Programs\Program;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;


class PdfController extends Controller
{
    public function show($id)
    {
//        // بارگذاری روابط لازم برای PDF
//        $program = Program::with('days.exercises.exercise')->findOrFail($id);
//        $view = view('ProgramPdf')
//            ->setOption('isHtml5ParserEnabled', true)
//            ->setOption('isRemoteEnabled', true)
//            ->render();
//
//        $contentLines = substr_count($view, '<tr>') ?: 30;
//        $estimatedHeight = max(842, $contentLines * 25 + 2000);
//
//        $pdf = Pdf::loadHTML($view, 'UTF-8')->setPaper([0, 0, 595.28, $estimatedHeight], 'portrait') ;
//        return $pdf->download('program-'.$program->id.'.pdf');
    }


    public function export($id)
    {
        $program = Program::with('days.exercises.exercise')->findOrFail($id);
        $file =  "{$program->cutomer}/" . 'برنامه تمرینی' . '-' . $program->customer . '.pdf';

        return Pdf::view('ProgramPdf', compact('program'))
            ->margins(10, 10, 10, 10)
            ->format('A4')                    // کاغذ استاندارد
            ->orientation('portrait')
            ->withBrowsershot(function ($shot) {
                $shot->setNodeBinary('/usr/local/bin/node')
                    ->setChromePath('/Applications/Google Chrome.app/Contents/MacOS/Google Chrome')
                    ->windowSize(1300, 0)
                    ->deviceScaleFactor(2)// عرض واقعی‌تر از ۷۹۴px
                    ->setOption('printBackground', true)
                    ->setOption('args', [
                        '--no-sandbox',
                        '--disable-gpu',
                        '--lang=fa-IR',
                    ])

                    ->setDelay(800);
            })
            ->save(storage_path("app/public/{$file}"))
            ->download($file);
    }


}
