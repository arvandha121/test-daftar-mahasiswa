<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Mahasiswa</title>
    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/detail.css') }}">
</head>
<body>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <td>
                    <h4>Detail Data Id {{ $data->id }}</h4>
                    <td></td>
                    <td></td>
                </td>
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td><b>:</b></td>
                <td>{{ $data->nama }}</td>
            </tr>
            <tr>
                <td><b>Nim</b></td>
                <td><b>:</b></td>
                <td>{{ $data->nis }}</td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td><b>:</b></td>
                <td>{{ $data->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td><b>Tanggal Lahir</b></td>
                <td><b>:</b></td>
                <td>{{ $data->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td><b>:</b></td>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td><b>Kota</b></td>
                <td><b>:</b></td>
                <td>{{ $data->kota }}</td>
            </tr>
        </table>
        <a href="/master/mahasiswa" class="btn btn-success">Kembali</a>
    </div>
</body>
</html>