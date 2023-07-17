<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" style="font-size: 25px">
            <i class="fa fa-bars ml-5 mr-3"></i>
            Dashboard
        </span>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Students</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $totalStudents }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Male</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $totalMaleStudents }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-female"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Female</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $totalFemaleStudents }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Presentase Mahasiswa Berdasarkan Gender</h4>
                                <canvas id="studentsGender" style="min-width: 50px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Presentase Mahasiswa Berdasarkan Asal Kota</h4>
                                <canvas id="studentsCity" style="min-width: 50px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Jumlah Mahasiswa Berdasarkan Tahun Kelahiran</h4>
                            <canvas id="birthYearChart" style="min-width: 50px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('studentsGender').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labelsGender),
                datasets: [{
                    label: 'Jumlah',
                    data: @json($datasetGender),
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)'
                    ],
                    borderColor: 'rgba(255, 255, 255, 255)',
                    borderWidth: 4
                }]
            },
        });
    </script>

    <script>
        var ctx = document.getElementById('studentsCity').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($labelsCity),
                datasets: [{
                    label: 'Jumlah',
                    data: @json($datasetCity),
                    backgroundColor: generateBackgroundColors(@json($datasetCity)),
                    borderColor: '#ffffff',
                    borderWidth: 1
                }]
            },
        });
    
        function generateBackgroundColors(data) {
            var backgroundColors = [];
            for (var i = 0; i < data.length; i++) {
                backgroundColors.push(getRandomColor());
            }
            return backgroundColors;
        }
    
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

    <script>
        var ctx = document.getElementById('birthYearChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labelsTahun),
                datasets: [{
                    label: 'Jumlah',
                    data: @json($datasetTahun),
                    backgroundColor: generateBackgroundColors(@json($datasetTahun)),
                    borderColor: '#ffffff',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'rgba(0, 0, 0, 0)' // Transparent color for labels
                        }
                    }
                }
            }
        });
    
        function generateBackgroundColors(data) {
            var backgroundColors = [];
            for (var i = 0; i < data.length; i++) {
                backgroundColors.push(getRandomColor());
            }
            return backgroundColors;
        }
    
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
</body>
</html>