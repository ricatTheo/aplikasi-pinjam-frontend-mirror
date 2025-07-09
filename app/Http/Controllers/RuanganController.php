<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(){
        $ruangans = Ruangan::with('fasilitas')->get();

        return view('ruangan', compact('ruangans'));
    }
}
