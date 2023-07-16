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
    <header class="mb-3">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/dashboard">Dashboard</a>
            <a href="/master/mahasiswa">Data Mahasiswa</a>
            <a href="/master/kota">Data Kota</a>
            <a href="/users">Administration</a>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()"  style="font-size: 25px"><i class="fa fa-bars ml-5"></i></span>
    </header>
    <div class="container">
        <div class="d-flex justify-content-start" style="margin-right: 25px">
            <div class="searchbar mb-3">
                <input class="search_input" type="text" name="" placeholder="Search..." value="{{ request('search') }}">
                <a href="#" class="search_icon">
                    <form action="{{ route('mahasiswa.index') }}" method="GET">
                        <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                    </form>
                </a>
            </div>
            <a href="/master/mahasiswa/create" class="btn btn-primary mb-3 ml-2">+</a>
        </div>
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
                        <td><a class="btn btn-secondary btn-sm" href="{{ url('/master/mahasiswa/'.$item->id) }}">Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
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