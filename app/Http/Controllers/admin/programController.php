<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class programController extends Controller
{
    public function programindex(){
        $perPage = 5;
        $program = Program::paginate($perPage);
        $title = 'Hapus Data Program!';
        $text = "Apakah Anda Yakin Akan Menghapusnya?";
        confirmDelete($title, $text);
        return view('admin.program.index',compact('program'));
    }

    public function addProgram(){
        return view('admin.program.addProgram');
    }

    public function editProgram(string $id){
        $program = Program::findOrFail($id); // Retrieve the Konten model instance
        return view('admin.program.editProgram', compact('program')); // Pass it to the view
    }

    // public function dashboard() {
    //     $perPage = 5; // Set the number of items per page
    //     $program = Program::paginate($perPage);
    //     return view('admin.dashboard', compact('program'));
    // }

    public function store(Request $request){
    $request->validate([
        'namaProgram' => 'required|string|max:100',
        'fotoProgram' => 'required|image|max:2048',
        'jenisProgram' => 'required|string|max:100', // validasi untuk foto
        'detailProgram' => 'required|string',
    ]);

    // Simpan foto
    $path = $request->file('fotoProgram')->store('uploads/program', 'public');

    // Buat konten baru
        Program::create([
            'namaProgram' => $request->namaProgram,
            'fotoProgram' => $path,
            'jenisProgram' => $request->jenisProgram,
            'detailProgram' => $request->detailProgram,
        ]);

        Alert::success('success', 'Program berhasil ditambahkan!');
        return redirect()->route('admin.program');
    }


    public function update(Request $request, $id){
        $request->validate([
            'namaProgram' => 'sometimes|required|string|max:100',
            'fotoProgram' => 'sometimes|image|max:2048',
            'jenisProgram' => 'sometimes|required|string|max:100', // validasi untuk foto
            'detailProgram' => 'sometimes|required|string',
        ]);
        $program = Program::findOrFail($id);

        // Simpan foto baru jika diunggah
            if ($request->hasFile('fotoProgram')) {
            // Hapus foto lama dari folder
            Storage::disk('public')->delete($program->fotoProgram);
            
            // Simpan foto baru
            $path = $request->file('fotoProgram')->store('uploads/program', 'public');
            $program->fotoProgram = $path;
        }

        $program->namaProgram = $request->namaProgram ?? $program->namaProgram;
        $program->jenisProgram = $request->jenisProgram ?? $program->jenisProgram;
        $program->detailProgram = $request->detailProgram ?? $program->detailProgram;
        $program->save();

        Alert::success('success', 'Program berhasil diubah!');
        return redirect()->route('admin.program');
    }

    public function destroy($id){
        $program = Program::findOrFail($id);
    
        // Hapus foto dari folder
        Storage::disk('public')->delete($program->fotoProgram);

        $program->delete();

        Alert::success('success', 'Program berhasil dihapus!');
        return redirect()->route('admin.program');
    }
}
