<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $dataTahun = DB::table('mahasiswa')
            ->select(DB::raw('YEAR(tanggal_lahir) as tahun'), DB::raw('count(*) as jumlahTahun'))
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();
        $labelsTahun = $dataTahun->pluck('tahun')->all();
        $datasetTahun = $dataTahun->pluck('jumlahTahun')->all();

        $dataGender = DB::table('mahasiswa')
            ->select(DB::raw('jenis_kelamin as kelamin'), DB::raw('count(*) as jumlahGender'))
            ->groupBy('kelamin')
            ->orderBy('kelamin')
            ->get();
        $labelsGender = $dataGender->pluck('kelamin')->all();
        $datasetGender = $dataGender->pluck('jumlahGender');

        $dataCity = DB::table('mahasiswa')
            ->select(DB::raw('kota as kotas'), DB::raw('count(*) as jumlahKota'))
            ->groupBy('kotas')
            ->orderBy('kotas')
            ->get();
        $labelsCity = $dataCity->pluck('kotas')->all();
        $datasetCity = $dataCity->pluck('jumlahKota');

        $totalStudents = Mahasiswa::count();
        $totalMaleStudents = Mahasiswa::where('jenis_kelamin', 'Laki-laki')->count();
        $totalFemaleStudents = Mahasiswa::where('jenis_kelamin', 'Perempuan')->count();

        return view("layouts/dashboard/dashboard", with(
            [
                'labelsTahun' => $labelsTahun , 
                'datasetTahun' => $datasetTahun, 
                'labelsGender' => $labelsGender,
                'datasetGender' => $datasetGender,
                'labelsCity' => $labelsCity,
                'datasetCity' => $datasetCity,
                'totalStudents' => $totalStudents, 
                'totalMaleStudents' => $totalMaleStudents, 
                'totalFemaleStudents' => $totalFemaleStudents
            ]
        ));
    }
}
