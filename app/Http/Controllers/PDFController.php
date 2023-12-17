<?php

// app/Http/Controllers/PDFController.php

namespace App\Http\Controllers;

use App\Models\Student;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PDFController extends Controller
{
    public function printPDF($studentid)
    {
        $datas = Student::findOrFail($studentid);

        // Render template invoice menggunakan Blade
        $html = view('invoice', compact('datas'))->render();

        // Buat objek PDF menggunakan dompdf atau mpdf
        // Jika menggunakan dompdf
        $pdf = new Dompdf();

        // Jika menggunakan mpdf
        // $pdf = new Mpdf();

        // Load HTML ke dalam PDF
        $pdf->loadHtml($html);

        // Optional: Set ukuran dan orientasi kertas
        $pdf->setPaper('A2', 'portrait');

        // Render PDF
        $pdf->render();

        // Optional: Untuk langsung menampilkan PDF di browser
        return $pdf->stream('mahasiswa.pdf', ['Attachment' => false]);
    }
}
