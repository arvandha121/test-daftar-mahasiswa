<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Mahasiswa</title>
    
    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">    
    
    <link rel="stylesheet" href="/path/to/cdn/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/menu.css') }}">

    {{-- jQuery UI CSS --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <header class="mb-3">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/dashboard">Dashboard</a>
            <a href="/master/mahasiswa">Data Mahasiswa</a>
            <a href="/master/kota">Data Kota</a>
            <a href="/users">Administration</a>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" style="font-size: 25px">
            <i class="fa fa-bars ml-5"></i>
            Data Mahasiswa
        </span>
    </header>
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('mahasiswa.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Nim Mahasiswa">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Mahasiswa">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir Mahasiswa">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
                    <label class="form-check-label" for="laki-laki">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Alamat Rumah Mahasiswa" name="alamat"></textarea>
            </div>
            <div class="mb-3">
                <label for="pelanggaran" class="form-label">Pelanggaran</label>
                <input type="text" class="form-control" id="pelanggaran" name="pelanggaran" placeholder="Tuliskan Pelanggaran Mahasiswa">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota Asal Mahasiswa">
            </div>
            <div class="mt-4">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    {{-- JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#tanggal_lahir").datepicker({
                dateFormat: "yy-mm-dd",  // Format tanggal yang ditampilkan
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>