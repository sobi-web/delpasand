<?php

namespace App\Http\Controllers;

use App\Models\Programs\Program;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show($id)
    {
        // بارگذاری روابط لازم برای PDF
        $program = Program::with('days.exercises.exercise')->findOrFail($id);

        $pdf = Pdf::loadView('ProgramPdf', compact('program'));
        return $pdf->download('program-'.$program->id.'.pdf');
    }
}
