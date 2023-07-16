<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class KotaController extends Controller
{
    public function index() {
        $data = Mahasiswa::select('kota')
                ->orderBy('id', 'asc')
                ->distinct()
                ->get();
        return view('layouts/master/kota/kota', compact('data'));
    }
}
