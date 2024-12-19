<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\Konten;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminHomeController extends Controller
{
    public function indexKandidat(){
        $perPage = 5; // Set the number of items per page
        $kandidat = Kandidat::paginate($perPage);
        return view('admin.kandidat.index',compact('kandidat'));
    }

    public function accept($id)
    {
        // Find the candidate by ID
        $kandidat = Kandidat::findOrFail($id);
        // Update the 'approve' field to 'Terima'
        $kandidat->approve = 'Terima';
        $kandidat->save();

        Alert::success('Success', 'Kandidat telah diterima.');
        return redirect()->route('admin.homeKandidat');
    }
    public function reject($id)
    {
        // Find the candidate by ID
        $kandidat = Kandidat::findOrFail($id);
        // Update the 'approve' field to 'Tolak'
        $kandidat->approve = 'Tolak';
        $kandidat->save();

        Alert::info('Info', 'Kandidat telah ditolak.');
        return redirect()->route('admin.homeKandidat');
    }
}
