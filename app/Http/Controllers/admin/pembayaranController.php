<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class pembayaranController extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::all();
        $title = 'Hapus Data Nama Bank!';
        $text = "Apakah Anda Yakin Akan Menghapusnya?";
        confirmDelete($title, $text);
        return view('admin.pembayaran.index',compact('pembayaran'));
    }
    public function addPembayaran(){
        return view('admin.pembayaran.addPembayaran');
    }
    public function edit(string $id){
        $pembayaran = Pembayaran::find($id);
        return view('admin.pembayaran.editPembayaran',compact('pembayaran'));
    }

    public function store(Request $request){
        $request->validate([
            'namaBank' => 'required|string|max:100',
            'logoBank' => 'required|image|max:2048', // validasi untuk foto
            'noRek' => 'required|string',
            'petunjuk' => 'required|string',
        ]);
    
        // Simpan foto
        $path = $request->file('logoBank')->store('uploads/pembayaran', 'public');
    
        // Buat konten baru
            Pembayaran::create([
                'namaBank' => $request->namaBank,
                'logoBank' => $path,
                'noRek' => $request->noRek,
                'petunjuk' => $request->petunjuk,
            ]);
            Alert::success('success', 'Nama Bank berhasil ditambahkan!');
            return redirect()->route('admin.pembayaran');
        }

        public function update(Request $request, $id){
            $request->validate([
                'namaBank' => 'sometimes|required|string|max:100',
                'logoBank' => 'sometimes|image|max:2048', // validasi untuk foto
                'noRek' => 'sometimes|required|string',
                'petunjuk' => 'sometimes|required|string',
            ]);
            $pembayaran = Pembayaran::findOrFail($id);
    
            // Simpan foto baru jika diunggah
                if ($request->hasFile('logoBank')) {
                // Hapus foto lama dari folder
                Storage::disk('public')->delete($pembayaran->logoBank);
                
                // Simpan foto baru
                $path = $request->file('logoBank')->store('uploads/pembayaran', 'public');
                $pembayaran->logoBank = $path;
            }
    
            $pembayaran->namaBank = $request->namaBank ?? $pembayaran->namaBank;
            $pembayaran->noRek = $request->noRek ?? $pembayaran->noRek;
            $pembayaran->petunjuk = $request->petunjuk ?? $pembayaran->petunjuk;
            $pembayaran->save();
    
            Alert::success('success', 'Nama Bank berhasil diubah!');
            return redirect()->route('admin.pembayaran');
        }

        public function destroy($id){
            $pembayaran = Pembayaran::findOrFail($id);
        
            // Hapus foto dari folder
            Storage::disk('public')->delete($pembayaran->logoBank);
    
            $pembayaran->delete();
            Alert::success('success', 'Nama Bank berhasil dihapus!');
            return redirect()->route('admin.pembayaran');
        }
}
