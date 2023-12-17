<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\ProspectiveStudent;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Show a list of all prospective students
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function getKabupaten(Request $request)
    {

        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        foreach ($kabupatens as $kabupaten) {
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }
    public function getKecamatan(Request $request)
    {

        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        foreach ($kecamatans as $kecamatan) {
            echo "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
    }
    // Show a specific prospective student's details
    public function show($id)
    {
        $provinsi = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        $student = Student::findOrFail($id);
        return view('admin.students.show', compact('provinsi', 'regencies', 'districts', 'student'));
    }

    // Update the registration status of a prospective student
    public function update(Request $request, Student $student, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only(['registration_status'])); // Assuming 'registration_status' is a column in your table
        return back()->with('success', 'Student registration status updated.');
    }


    // Delete a prospective student's record
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        // Optionally remove the document from storage
        if ($student->document_path) {
            Storage::delete($student->document_path);
        }
        $student->delete();
        return back()->with('success', 'Student record deleted.');
    }
}
