<?php

namespace App\Http\Controllers\kandidat;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KandidatController extends Controller
{
    public function index(){
        $kandidat = Kandidat::all();
        return view('kandidat.dashboard',compact('kandidat'));
    }   

    public function addKandidat(){
        return view('kandidat.daftar');
    }
    public function editKandidat(String $id){
        $kandidat = Kandidat::find($id);
        return view('kandidat.editKandidat',compact('kandidat'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'votes_count' => 'nullable|integer',
            'bulan' => 'required|string|max:100',
            'tahun' => 'required|string|max:100',
            'nama_kandidat' => 'required|string|max:100',
            'email' => 'required|email|unique:kandidats,email',
            'foto_kandidat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file upload
            'pendidikan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'tinggi_badan' => 'required|string|max:10',
            'berat_badan' => 'required|string|max:10',
            'bahasa' => 'required|string|max:25',
            'kebudayaan' => 'required|string|max:25',
            'musik' => 'required|string|max:25',
            'pengetahuan' => 'required|string|max:25',
            'approve' => 'nullable|in:Proces,Tolak,Terima', // Make it nullable since it has a default value
        ]);

        // Handle file upload
        $path = $request->file('foto_kandidat')->store('uploads/kandidats', 'public'); // Store file in the public disk

        // Check if 'approve' is provided, if not, set it to 'Proces'
        $approve = $request->approve ?? 'Proces';

        // Create a new candidate record
        $kandidat=Kandidat::create([
            'user_id' => $request->user_id,
            'votes_count' => $request->votes_count ?? 0,  // Default to 0 if not provided
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_kandidat' => $request->nama_kandidat,
            'email' => $request->email,
            'foto_kandidat' => $path,  // Store the path to the uploaded file
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'bahasa' => $request->bahasa,
            'kebudayaan' => $request->kebudayaan,
            'musik' => $request->musik,
            'pengetahuan' => $request->pengetahuan,
            'approve' => $approve, // Set the value of 'approve' (defaults to 'Proces')
        ]);
        Alert::success('success', 'Kamu Telah Mendaftar Sebagai Kandidat!');
        return redirect()->route('kandidat.dashboard');
    }

    public function update(Request $request, $id){
        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'votes_count' => 'sometimes|nullable|integer',
            'bulan' => 'sometimes|required|string|max:100',
            'tahun' => 'sometimes|required|string|max:100',
            'nama_kandidat' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email',
            'foto_kandidat' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file upload
            'pendidikan' => 'sometimes|required|string|max:100',
            'pekerjaan' => 'sometimes|required|string|max:100',
            'tinggi_badan' => 'sometimes|required|string|max:10',
            'berat_badan' => 'sometimes|required|string|max:10',
            'bahasa' => 'sometimes|required|string|max:25',
            'kebudayaan' => 'sometimes|required|string|max:25',
            'musik' => 'sometimes|required|string|max:25',
            'pengetahuan' => 'sometimes|required|string|max:25',
            'approve' => 'sometimes|nullable|in:Proces,Tolak,Terima', // Make it nullable since it has a default value
        ]);
        $kandidat = Kandidat::findOrFail($id);

        // Simpan foto baru jika diunggah
            if ($request->hasFile('foto_kandidat')) {
            // Hapus foto lama dari folder
            Storage::disk('public')->delete($kandidat->foto_kandidat);
            
            // Simpan foto baru
            $path = $request->file('foto_kandidat')->store('uploads/kandidat', 'public');
            $kandidat->foto_kandidat = $path;
        }

        $kandidat->user_id = $request->user_id ?? $kandidat->user_id;
        $kandidat->votes_count = $request->votes_count ?? $kandidat->votes_count;
        $kandidat->bulan = $request->bulan ?? $kandidat->bulan;
        $kandidat->tahun = $request->tahun ?? $kandidat->tahun;
        $kandidat->nama_kandidat = $request->nama_kandidat ?? $kandidat->nama_kandidat;
        $kandidat->email = $request->email ?? $kandidat->email;
        $kandidat->pendidikan = $request->pendidikan ?? $kandidat->pendidikan;
        $kandidat->pekerjaan = $request->pekerjaan ?? $kandidat->pekerjaan;
        $kandidat->tinggi_badan = $request->tinggi_badan ?? $kandidat->tinggi_badan;
        $kandidat->berat_badan = $request->berat_badan ?? $kandidat->berat_badan;
        $kandidat->bahasa = $request->bahasa ?? $kandidat->bahasa;
        $kandidat->kebudayaan = $request->kebudayaan ?? $kandidat->kebudayaan;
        $kandidat->musik = $request->musik ?? $kandidat->musik;
        $kandidat->pengetahuan = $request->pengetahuan ?? $kandidat->pengetahuan;
        $kandidat->approve = $request->approve ?? $kandidat->approve;
        $kandidat->save();

        Alert::success('success', 'Data berhasil diubah!');
        return redirect()->route('kandidat.dashboard');
    }
}
