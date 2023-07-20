<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Kota</title>
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
            Data Kota
        </h4>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <form action="{{ route('kota.index') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search..." name="kota" value="{{ request('kota') }}">
                        <button class="btn btn-success" type="submit">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">KOTA</th>
                    <th scope="col">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kota }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>