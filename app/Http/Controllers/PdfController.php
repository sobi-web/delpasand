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
        $url = route('pdf.preview', ['id' => $id]);
       $customer = str_replace(' ' , '-', $program->customer);
        $fileName = "برنامه-تمرینی-{$customer}.pdf";
        $relativePath = "progarms/{$program->id}/{$fileName}";
        $localPath = storage_path("app/public/{$relativePath}");


        // 💡 نکته: متدها را پشت سر هم زنجیر کن بدون return string
         $pdf =  Browsershot::url($url) // توجه کن که این باید setUrl باشه نه url()
            ->setOption('browserWSEndpoint', env('REMOTE_CHROME_WSS'))
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
            ->delay(1500)
            ->waitUntilNetworkIdle()
             ->timeout(90000)
             ->pdf($localPath);


        // متد اصلی تولید PDF (می‌سازه و فایل رو ذخیره می‌کنه)

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename={$fileName} ");    }

}
