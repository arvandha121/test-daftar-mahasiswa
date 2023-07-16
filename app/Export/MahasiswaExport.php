<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class MahasiswaExport implements FromCollection, WithHeadings
// {
//     public function collection() {
//         return Mahasiswa::all();
//     }

//     public function headings(): array
//     {
//         return [
//             'ID',
//             'NIM',
//             'Nama',
//             'Tanggal Lahir',
//             'Jenis Kelamin',
//             'Alamat',
//             'Kota',
//         ];
//     }
// }