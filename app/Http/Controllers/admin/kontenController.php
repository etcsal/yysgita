<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class kontenController extends Controller
{

    public function dashboard() {
        $perPage = 5; // Set the number of items per page
        $konten = Konten::paginate($perPage);
        $title = 'Hapus Data Konten!';
        $text = "Apakah Anda Yakin Akan Menghapusnya?";
        confirmDelete($title, $text);
        return view('admin.dashboard', compact('konten'));
    }
    

    public function addKonten(){
        return view('admin.konten.addKonten');
    }

    public function store(Request $request){
    $request->validate([
        'judulKonten' => 'required|string|max:100',
        'fotoKonten' => 'required|image|max:2048', // validasi untuk foto
        'detailKonten' => 'required|string',
    ]);

    // Simpan foto
    $path = $request->file('fotoKonten')->store('uploads/konten', 'public');

    // Buat konten baru
        Konten::create([
            'judulkonten' => $request->judulkonten,
            'fotoKonten' => $path,
            'detailKonten' => $request->detailKonten,
        ]);
        Alert::success('success', 'Konten berhasil ditambahkan!');
        return redirect()->route('admin.dashboard');
    }

    public function editKonten(string $id){
        $konten = Konten::findOrFail($id); // Retrieve the Konten model instance
        return view('admin.konten.editKonten', compact('konten')); // Pass it to the view
    }


    public function update(Request $request, $id){
        $request->validate([
            'judulkonten' => 'sometimes|required|string|max:100',
            'fotoKonten' => 'sometimes|image|max:2048', // validasi untuk foto
            'detailkonten' => 'sometimes|required|string',
        ]);
        $konten = Konten::findOrFail($id);

        // Simpan foto baru jika diunggah
            if ($request->hasFile('fotoKonten')) {
            // Hapus foto lama dari folder
            Storage::disk('public')->delete($konten->fotoKonten);
            
            // Simpan foto baru
            $path = $request->file('fotoKonten')->store('uploads/konten', 'public');
            $konten->fotoKonten = $path;
        }

        $konten->judulkonten = $request->judulkonten ?? $konten->judulkonten;
        $konten->detailKonten = $request->detailKonten ?? $konten->detailKonten;
        $konten->save();

        Alert::success('success', 'Konten berhasil diubah!');
        return redirect()->route('admin.dashboard');
    }

    public function destroy($id){
        $konten = Konten::findOrFail($id);
    
        // Hapus foto dari folder
        Storage::disk('public')->delete($konten->fotoKonten);

        $konten->delete();
        Alert::success('success', 'Konten berhasil dihapus!');
        return redirect()->route('admin.dashboard');
    }


}
