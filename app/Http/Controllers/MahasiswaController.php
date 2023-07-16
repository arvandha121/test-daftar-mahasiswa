<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Mahasiswa::where(function ($query) use ($search) {
            $query->where('nis', 'LIKE', "%$search%")
                ->orWhere('nama', 'LIKE', "%$search%")
                ->orWhere('tanggal_lahir', 'LIKE', "%$search%")
                ->orWhere('jenis_kelamin', 'LIKE', "%$search%")
                ->orWhere('alamat', 'LIKE', "%$search%")
                ->orWhere('kota', 'LIKE', "%$search%");
        })->orderBy('id', 'asc')->paginate(5);
        return view("layouts/master/mahasiswa/mahasiswa", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/master/mahasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nis'=>'required|numeric',
                'nama'=>'required',
                'tanggal_lahir'=>'required',
                'jenis_kelamin'=>'required',
                'alamat'=>'required',
                'kota'=>'required',
            ]
        );
        $data = [
            'nis'=>$request->input('nis'),
            'nama'=>$request->input('nama'),
            'tanggal_lahir'=>$request->input('tanggal_lahir'),
            'jenis_kelamin'=>$request->input('jenis_kelamin'),
            'alamat'=>$request->input('alamat'),
            'kota'=>$request->input('kota'),
        ];
        Mahasiswa::create($data);
        return redirect('/master/mahasiswa')->with('success', 'Data mahasiswa berhasil diupload.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::where('id', $id)->first();
        return view('layouts/master/mahasiswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
