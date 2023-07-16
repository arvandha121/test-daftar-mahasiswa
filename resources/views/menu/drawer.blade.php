@extends('layouts/menu')

@section('content-menu')
    <ul>
        <li>
            <a href="/dashboard">
                <span class="icon"></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <span class="icon"></span>
            <span class="title">Data Mahasiswa</span>
            <ul>
                <li><a href="/master/mahasiswa" class="drop-item">Mahasiswa</a></li>
                <li><a href="/master/kota" class="drop-item">Kota</a></li>
            </ul>
        </li>
        <li>
            <a href="/users">
                <span class="icon"></span>
                <span class="title">Administration</span>
            </a>
        </li>
    </ul>
@endsection