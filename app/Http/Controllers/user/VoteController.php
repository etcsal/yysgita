<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function voteHome() {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your votes.');
        }
        $user = Auth::user();
        $votes = Vote::with('kandidat')->where('user_id', $user->id)->get();
        return view('user.vote', compact('votes'));
    }
    

    public function vote(Request $request, $kandidatId){
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $kandidat = Kandidat::findOrFail($kandidatId); // Mendapatkan kandidat berdasarkan ID

        // Cek apakah pengguna sudah memberikan suara untuk kandidat ini
        $existingVote = Vote::where('user_id', $user->id)
                            ->where('kandidat_id', $kandidatId)
                            ->first();

        if ($existingVote) {
            return redirect()->back()->with('error', 'Anda sudah memberikan suara untuk kandidat ini.');
        }

        // Menambahkan suara baru
        Vote::create([
            'user_id' => $user->id,
            'kandidat_id' => $kandidatId,
        ]);

        // Update jumlah suara pada kandidat (increment)
        $kandidat->increment('votes_count');

        return redirect()->route('user.kandidat')->with('success', 'Vote Anda telah berhasil!');
    }

    public function deleteVote($id){
        $vote = Vote::findOrFail($id);

        // Pastikan vote ini milik user yang sedang login
        if ($vote->user_id == Auth::id()) {
            $vote->delete();
            return redirect()->route('user.voteHome')->with('success', 'Vote berhasil dihapus.');
        }

        return redirect()->route('user.voteHome')->with('error', 'Tidak diizinkan untuk menghapus vote ini.');
    }


}
