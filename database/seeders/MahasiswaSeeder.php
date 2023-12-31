<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720134',
                'nama'=>'Arief Nauvan Ramadha',
                'tanggal_lahir'=>'2001-11-20',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Perumahan pondok kencana I/1',
                'pelanggaran'=>'Push up',
                'kota'=>'Nganjuk',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720130',
                'nama'=>'Ahmad Rafif Alaudin',
                'tanggal_lahir'=>'2002-01-12',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Perumahan Pondok Asri K/10',
                'pelanggaran'=>'Push up',
                'kota'=>'Kediri',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720010',
                'nama'=>'Taufik Anwar',
                'tanggal_lahir'=>'2001-08-15',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Jalan Raya Mulyoagung No.122',
                'pelanggaran'=>'Push up',
                'kota'=>'Malang',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720098',
                'nama'=>'Alun Mega',
                'tanggal_lahir'=>'2001-03-10',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Jalan Dr. Soetomo V/15',
                'pelanggaran'=>'Push up',
                'kota'=>'Nganjuk',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720016',
                'nama'=>'Atmayanti',
                'tanggal_lahir'=>'2003-03-15',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Desa Bandung',
                'pelanggaran'=>'Push up',
                'kota'=>'Tulungagung',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720015',
                'nama'=>'Muchammad Rizal Gusnanda Atmaja',
                'tanggal_lahir'=>'2003-10-12',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Desa Dawuhan',
                'pelanggaran'=>'Push up',
                'kota'=>'Trenggalek',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720100',
                'nama'=>'Venny Meida Hersianty',
                'tanggal_lahir'=>'2002-01-11',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Jalan Sidoagung No.155',
                'pelanggaran'=>'Push up',
                'kota'=>'Malang',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
    }
}
