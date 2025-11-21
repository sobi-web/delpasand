<?php

namespace App\Http\Controllers;

use App\Models\Programs\Program;
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
        $program = Program::with('days.exercises.exercise')->findOrFail($id);


        return view('ProgramPdf' , ['program' => $program]);
    }





    public function export($id)
    {
        $program = Program::findOrFail($id);

        // آدرس کامل ویو
        $url = route('pdf.preview', ['id' => $id]);

        $fileName = "برنامه تمرینی - {$program->customer}.pdf";
        $relativePath = "{$program->customer}/{$fileName}";
        $localPath = storage_path("app/public/{$relativePath}");

        // Browsershot مستقیم با URL
        Browsershot::url($url)
            ->setOption('browserWSEndpoint', env('REMOTE_CHROME_WSS')) // آدرس Chrome ریموت Liara
            ->setNodeBinary(env('BROWSERSHOT_NODE_PATH', '/usr/bin/node'))
            ->setOption('args', [
                '--no-sandbox',
                '--disable-gpu',
                '--disable-dev-shm-usage',
                '--disable-setuid-sandbox',
                '--no-zygote',
                '--disable-background-timer-throttling',
                '--disable-backgrounding-occluded-windows',
                '--disable-renderer-backgrounding',
                '--disable-extensions',
                '--disable-breakpad',
                '--lang=fa-IR',
            ])
            ->setOption('printBackground', true)
            ->format('A4')
            ->delay(1500) // کمی صبر برای رندر کامل JS اگر داری
            ->waitUntilNetworkIdle()
            ->timeout(90000)
            ->pdf()
            ->save($localPath);

        // فایل خروجی به کاربر برگردان
        return response()->download($localPath, $fileName);
    }

}
