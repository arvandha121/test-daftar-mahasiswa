<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>

    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">    
    
    <link rel="stylesheet" href="/path/to/cdn/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/menu.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <header class="in-line d-flex justify-content-start align-items-center mb-1">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/dashboard"><i class="fa fa-home mr-2"></i>Dashboard</a>
            <a href="/master/mahasiswa"><i class="fa fa-database mr-2"></i>Data Mahasiswa</a>
            <a href="/master/kota"><i class="fa fa-city mr-2"></i>Data Kota</a>
            <a href="/users"><i class="fa fa-key mr-2"></i>Administration</a>
            <hr> <!-- Line separator -->
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" style="font-size: 25px">
            <i class="fa fa-bars ml-5 mr-2"></i>
        </span>
        <h4 class="ml-3 mt-1">
            Data Mahasiswa
        </h4>
    </header>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-5 mt-3">
                <form action="{{ route('mahasiswa.index') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search..." name="search" value="{{ request('search')}}">
                        <button class="btn btn-success" type="submit">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-end col-md-7 text-md-end mb-3">
                <a href="/master/mahasiswa/create" class="btn btn-primary mt-3 mb-4 ml-2">+ Tambah Data</a>
                <a href="/master/cetak_pdf" class="btn btn-danger mt-3 mb-4 ml-2"><span><i class="fa fa-print"></i></span></a>
                <a href="" class="btn btn-success disabled mt-3 mb-4 ml-2"><span><i class="fa fa-file"></i></span></a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" onchange="filterData()">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="kota">Kota:</label>
                <select name="kota" id="kota" class="form-control">
                    <option value="">Pilih Kota</option>
                    @foreach ($kotaList as $kota)
                        <option value="{{ $kota }}">{{ $kota }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">KOTA</th>
                    <th scope="col">DETAIL</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kota }}</td>
                            <td>
                                <a class="btn btn-success btn-sm d-inline" href="{{ url('/master/mahasiswa/'.$item->id) }}">
                                    <span><i class="fa fa-file"></i></span>
                                </a>
                                <a class="btn btn-warning btn-sm d-inline" href="{{ url('/master/mahasiswa/'.$item->id. '/edit') }}">
                                    <span><i class="fa fa-pen"></i></span>
                                </a>
                                <form class="d-inline" action="{{ '/master/mahasiswa/'.$item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <span><i class="fa fa-trash"></i></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-4">
            {{ $data->links() }}
        </div>
    </div>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <script>
        function filterData() {
            var jenisKelamin = document.getElementById('jenis_kelamin').value;
            var kota = document.getElementById('kota').value;

            var table = document.querySelector('.table');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var jenisKelaminCell = row.getElementsByTagName('td')[4];
                var kotaCell = row.getElementsByTagName('td')[6];
                var jenisKelaminData = jenisKelaminCell.textContent.trim();
                var kotaData = kotaCell.textContent.trim();

                if (
                    (kota === '' || kotaData === kota) && (jenisKelamin === '' || jenisKelaminData === jenisKelamin)
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>