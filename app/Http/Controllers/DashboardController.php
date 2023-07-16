<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $birthYears = $this->getBirthYearData();

        return view("layouts/dashboard/dashboard", compact('birthYears'));
    }

    public function getBirthYearData() {
        $birthYears = Mahasiswa::select(DB::raw("YEAR(tanggal_lahir) as year"))
            ->distinct()
            ->orderBy('year', 'asc')
            ->get()
            ->pluck('year');

            $birthYearCounts = Mahasiswa::select(DB::raw('YEAR(tanggal_lahir) as birth_year'), DB::raw('COUNT(*) as count'))
            ->groupBy('birth_year')
            ->orderBy('birth_year')
            ->get();
        
        return view("layouts/dashboard/dashboard", compact('birthYears', 'birthYearCounts'));
    }

    // public function barChart() {

    //     $birthYears = Mahasiswa::select(DB::raw('YEAR(tanggal_lahir) as birth_year'))
    //         ->distinct()
    //         ->pluck('birth_year');

    //     $birthYearCounts = Mahasiswa::select(DB::raw('YEAR(tanggal_lahir) as birth_year'), DB::raw('COUNT(*) as count'))
    //         ->groupBy('birth_year')
    //         ->orderBy('birth_year')
    //         ->get();

    //     return response()->json([
    //         'birthYears' => $birthYears,
    //         'birthYearCounts' => $birthYearCounts,
    //     ]);
        
    //     // $data = Mahasiswa::selectRaw("YEAR(tanggal_lahir) as year, COUNT(*) as count")
    //     //     ->whereYear('tanggal_lahir', date('Y'))
    //     //     ->groupBy('year')
    //     //     ->orderBy('year')
    //     //     ->get();
        
    //     // $label = [];
    //     // $data = [];
    //     // $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#FF5722', '#FF5722', '#009688'];

    //     // for($i = 0; $i < count($data); $i++) {
    //     //     $year = date('F', mktime(0,0,0,0,0,$i));
    //     //     $count = 0;


    //     // }
    // }
}
