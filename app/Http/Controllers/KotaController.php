<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class KotaController extends Controller
{
    // public function index(Request $request) {
    //     $data = Mahasiswa::select('kota')
    //             ->orderBy('id', 'asc')
    //             ->distinct()
    //             ->get();
    //     return view('layouts/master/kota/kota', compact('data'));
    // }
    public function index(Request $request) {
        $kota = $request->input('kota');
        $data = Mahasiswa::query();

        if ($kota) {
            $data = $data->where('kota', 'LIKE', "%$kota%");
        }

        if ($kota) {
            $data = $data->where('kota', $kota);
        }

        $data = $data->select('kota')
            ->orderBy('id', 'asc')
            ->distinct()
            ->get();

        return view('layouts/master/kota/kota', compact('data', 'kota'));
    }
}
