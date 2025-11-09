<?php

namespace App\Http\Controllers;

use App\Models\Programs\Program;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;


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
        $programView = view('ProgramPdf')->render();
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

    public function download($program_id) {
        $program = Program::with('days.exercises.exercise')->findOrFail($program_id);
        $html = view('ProgramPdf', compact('program'))->render();

        $screenshotPath = storage_path("app/public/program_{$program_id}.png");
        $pdfPath = storage_path("app/public/program_{$program_id}.pdf");

        // مرحله 1: گرفتن snapshot بلند از کل صفحه (بدون صفحه‌بندی)
        Browsershot::html($html)
            ->setNodeBinary('/usr/local/bin/node')
            ->setChromePath('/Applications/Google Chrome.app/Contents/MacOS/Google Chrome')
            ->noSandbox()
            ->setDelay(1000)
            ->windowSize(1920, 1)
            ->setScreenshotType('png')
            ->fullPage() // 💥 کل صفحه بدون قطع شدن
            ->save($screenshotPath);

        // مرحله 2:‌ تبدیل تصویر به PDF با همان طول و عرض کامل
        $pdf = Pdf::loadHTML("<img src='data:image/png;base64," . base64_encode(file_get_contents($screenshotPath)) . "' style='width:100%;height:auto;'>");

        return $pdf->download("program.pdf");
    }



}
