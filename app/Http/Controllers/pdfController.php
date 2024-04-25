<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    /* ========================================
    Generar un PDF en Laravel con DomPDF
    ========================================= */
    public function pdf(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        // dd($data);
        // $pdf = Pdf::loadView('pdf.generate-pdf', $data);
        // return $pdf->download('user.pdf');

        $pdf = Pdf::loadView('pdf.generate-pdf', $data);
        $output = $pdf->output();
        return response()->json([ 'pdf' => base64_encode($output), 'status' => 200 ], 200);
    }


    public function pdfView(){
        return view('pdf.view-pdf');
    }
}
