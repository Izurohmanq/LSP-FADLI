<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CalonMahasiswaController extends Controller
{
    // Show the form for creating a new calon mahasiswa
    public function create()
    {
        
        $provinsi = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('calon_mahasiswa.create', compact('provinsi', 'regencies', 'districts'));
    }

    // Store a newly created calon mahasiswa in storage
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'id_card_address' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email',
            'nationality_status' => 'required|string|max:255',
            'foreign_nationality' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf|max:2048', // 2MB Max
        ]);

        $calonMahasiswa = Student::create($request->all());

        if ($request->hasFile('document')) {
            $pdf = $request->file('document');
            $filename = time() . '_' . $pdf->getClientOriginalName();
            Storage::putFileAs(
                'documents',
                $pdf,
                $filename
            );

            // Save the PDF file path in the database
            $calonMahasiswa->document_path = 'documents/' . $filename;
            $calonMahasiswa->save();
        }

        // After storing the data and document, redirect to the registration page
        return redirect()->route('calon_mahasiswa.show')->with('success', 'Student data added');
    }

    public function index()
    {
        $students = Student::all();
        return view('calon_mahasiswa.index', compact('students'));
    }
    
}
