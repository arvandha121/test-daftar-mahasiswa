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
                'tanggal_lahir'=>'20 November 2001',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Perumahan pondok kencana I/1',
                'kota'=>'Nganjuk',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720130',
                'nama'=>'Ahmad Rafif Alaudin',
                'tanggal_lahir'=>'10 February 2002',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Perumahan Pondok Asri K/10',
                'kota'=>'Kediri',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720010',
                'nama'=>'Taufik Anwar',
                'tanggal_lahir'=>'15 December 2001',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Jalan Raya Mulyoagung No.122',
                'kota'=>'Malang',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720098',
                'nama'=>'Alun Mega',
                'tanggal_lahir'=>'10 March 2002',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Jalan Dr. Soetomo V/15',
                'kota'=>'Nganjuk',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720016',
                'nama'=>'Atmayanti',
                'tanggal_lahir'=>'25 March 2002',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Desa Bandung',
                'kota'=>'Tulungagung',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720015',
                'nama'=>'Muchammad Rizal Gusnanda Atmaja',
                'tanggal_lahir'=>'10 June 2001',
                'jenis_kelamin'=>'Laki-laki',
                'alamat'=>'Desa Dawuhan',
                'kota'=>'Trenggalek',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
        DB::table('mahasiswa')->insert(
            [
                'nis'=>'2041720100',
                'nama'=>'Venny Meida Hersianty',
                'tanggal_lahir'=>'31 May 2001',
                'jenis_kelamin'=>'Perempuan',
                'alamat'=>'Jalan Sidoagung No.155',
                'kota'=>'Malang',
                'created_at'=>date('Y-m-d H:i:s')
            ]
        );
    }
}
