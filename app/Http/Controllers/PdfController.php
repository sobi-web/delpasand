<?php

namespace App\Http\Controllers;

use App\Models\Programs\Program;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $name = $program->customer ;
        $program_name =  'برنامه'. '-' . $name . '.pdf';
        $programView = view('ProgramPdf' , [
            'program' => $program,
        ])->render();
        // تولید PDF با پشتیبانی کامل از Tailwind و RTL فارسی
        return Pdf::html($programView)
            ->margins(0, 0, 0, 0)
            ->landscape(true)
            ->withBrowsershot(function (Browsershot $shot) {
                $shot->setNodeBinary('/usr/local/bin/node')
                    ->setChromePath('/Applications/Google Chrome.app/Contents/MacOS/Google Chrome')
                    ->noSandbox()
                    ->setDelay(1000)
                    ->setOption('printBackground', true)
                    ->setOption('displayHeaderFooter', false)
                    ->setOption('preferCSSPageSize', false)
                    ->setOption('args', [
                        '--no-sandbox',
                        '--headless=new',
                        '--disable-gpu',
                        '--disable-print-preview',
                        '--print-to-pdf-no-header',
                        '--lang=fa-IR',
                    ])
                    ->windowSize(1920, 50000)                 // 🚀 ارتفاع زیاد برای snapshot کامل
                    ->setOption('paperWidth', 1920 / 96)      // حدود 20 اینچ عرض
                    ->setOption('paperHeight', 50000 / 96)    // حدود 13 متر ارتفاع
                    ->setOption('marginTop', 0)
                    ->setOption('marginBottom', 0)
                    ->setOption('marginLeft', 0)
                    ->setOption('marginRight', 0)

                    // 🚫 حذف کلی صفحه‌بندی
                    ->setOption('scale', 1)
                    ->setOption('printBackground', true)
                    ->setOption('preferCSSPageSize', false);
            })
            ->download($program_name);
    }


}
