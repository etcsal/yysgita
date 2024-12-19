<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }
    
    public function kandidat(){
        $kandidat=Kandidat::all();
        return view('user.daftarKandidat',compact('kandidat'));
    }
}
