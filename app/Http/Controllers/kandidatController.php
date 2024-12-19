<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\PemberitahuanKandidat;

class kandidatController extends Controller
{
    public function homeKandidat(){
        $kandidat = Kandidat::all();
        return view('admin.kandidat.index',compact('kandidat'));
    }
    public function addKandidat(){
        return view('admin.kandidat.addKandidat');
    }
    public function store(Request $request){
        $request->validate([
            'bulan' => 'required|string|max:100',
            'tahun' => 'required|string|max:100',
            'nama_kandidat' => 'required|string|max:100',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:kandidats'],
            'foto_kandidat' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            'pendidikan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'tinggi_badan' => 'required|string|max:10',
            'berat_badan' => 'required|string|max:10',
            'bahasa' => 'nullable|string|max:25',
            'kebudayaan' => 'nullable|string|max:25',
            'musik' => 'nullable|string|max:25',
            'pengetahuan' => 'nullable|string|max:25',
            'approve' => 'in:Proces,Tolak,Terima', // Ensure it's one of the ENUM values
        ]);

        $approve = $request->input('approve', 'Proces');

        $path = $request->file('foto_kandidat')->store('uploads/kandidat', 'public');
        $kandidat = Kandidat::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_kandidat' => $request->nama_kandidat,
            'email' => $request->email,
            'foto_kandidat' => $path,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'bahasa' => $request->bahasa,
            'kebudayaan' => $request->kebudayaan,
            'musik' => $request->musik,
            'pengetahuan' => $request->pengetahuan,
            'approve' => $approve,

        ]);
        Mail::to($kandidat->email)->send(new PemberitahuanKandidat($kandidat));
        Alert::success('success', 'Anda Berhasil Daftar Sebagai Kandidat!');
        return redirect()->route('admin.kandidat');
    }
}
