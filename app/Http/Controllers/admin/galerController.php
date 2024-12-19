<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class galerController extends Controller
{
    public function indexGaleri(){
        $galeri = Galeri::all();
        $title = 'Hapus Data Konten!';
        $text = "Apakah Anda Yakin Akan Menghapusnya?";
        confirmDelete($title, $text);
        return view('admin.galeri.index',compact('galeri'));
    }
    
    public function addGaleri(){
        return view('admin.galeri.addGaleri');
    }
    public function editGaleri(String $id){
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.editGaleri',compact('galeri'));
    }

    public function store(Request $request){
        $request->validate([
            'judulGaleri' => 'required|string|max:255',
            'kategoriGaleri' => 'required|in:Foto,Video',
            'fotoVidio' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'videoKonten' => 'nullable|url', 
        ]);

        $galeri = new Galeri();
        $galeri->judulGaleri = $request->judulGaleri;
        $galeri->kategoriGaleri = $request->kategoriGaleri;

        if ($request->kategoriGaleri === 'Foto' && $request->hasFile('fotoVidio')) {
            $file = $request->file('fotoVidio');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/galeri', $filename, 'public');
            $galeri->fotoVidio = 'uploads/galeri/' . $filename;
        } elseif ($request->kategoriGaleri === 'Video') {
            $galeri->videoKonten = $request->videoKonten;
        }

        $galeri->save();

        Alert::success('success', 'Galeri berhasil ditambah!');
        return redirect()->route('admin.galeri');
    }

    public function update(Request $request, $id){
        $request->validate([
            'judulGaleri' => 'required|string|max:255',
            'kategoriGaleri' => 'required|in:Foto,Video',
            'fotoVidio' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videoKonten' => 'nullable|url',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->judulGaleri = $request->judulGaleri;
        $galeri->kategoriGaleri = $request->kategoriGaleri;

        if ($request->kategoriGaleri === 'Foto' && $request->hasFile('fotoVidio')) {
            if ($galeri->fotoVidio) {
                Storage::disk('public')->delete($galeri->fotoVidio);
            }

            $file = $request->file('fotoVidio');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/galeri', $filename, 'public');
            $galeri->fotoVidio = 'uploads/galeri/' . $filename;
        } elseif ($request->kategoriGaleri === 'Video') {
            $galeri->videoKonten = $request->videoKonten;
        }

        $galeri->save();

        Alert::success('success', 'Galeri berhasil diubah!');
        return redirect()->route('admin.galeri');
    }

    public function destroy($id){
    $galeri = Galeri::findOrFail($id);
    if ($galeri->kategoriGaleri === 'Foto' && $galeri->fotoVidio) {
        Storage::disk('public')->delete($galeri->fotoVidio);
    }
    $galeri->delete();
    Alert::success('success', 'Galeri berhasil dihapus!');
    return redirect()->route('admin.galeri');
}



}
