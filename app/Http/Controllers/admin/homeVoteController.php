<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\WinnerNotification;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class homeVoteController extends Controller
{
    public function homeVote(Request $request){
        $perPage = 5; // Set the number of items per page
        // Ambil query parameters dari request
        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');
        // Query Kandidat dengan filter bulan dan tahun
        $kandidat = Kandidat::query();
        if ($bulan) {
            $kandidat->where('bulan', $bulan); // Assuming 'bulan' is stored as a string like 'Januari'
        }
        if ($tahun) {
            $kandidat->where('tahun', $tahun); // Assuming 'tahun' is stored as a number
        }
        // Paginasi hasil
        $kandidat = $kandidat->paginate($perPage);
        return view('admin.vote.index', compact('kandidat'));
    }

    public function getWinner(Request $request){
        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');
        // Filter kandidat berdasarkan bulan dan tahun
        $query = Kandidat::query();
        if ($bulan) {
            $query->where('bulan', $bulan); // Pastikan 'bulan' ada di tabel
        }
        if ($tahun) {
            $query->where('tahun', $tahun); // Pastikan 'tahun' ada di tabel
        }
        // Cari kandidat dengan suara terbanyak
        $maxVotes = $query->max('votes_count');
        $winners = $query->where('votes_count', $maxVotes)->get();
        if ($winners->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada pemenang untuk periode ini.');
        }
        
        return view('admin.vote.winner', compact('winners'));
    }

    public function setWinner($id){
        // Cari kandidat berdasarkan ID
        $kandidat = Kandidat::findOrFail($id);

        // Tandai kandidat sebagai pemenang
        $kandidat->update(['is_winner' => true]);

        // Kirim email pemberitahuan
        Mail::to($kandidat->email)->send(new WinnerNotification($kandidat));

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Kandidat telah ditandai sebagai pemenang dan email telah dikirim.');
    }

}
