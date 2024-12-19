<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Konten;
use App\Models\Program;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index(){
        $konten = Konten::all();
        $program = Program::all();
        $kandidat = Kandidat::all();
        return view('landingpage',compact('konten','kandidat','program'));
    }
}
