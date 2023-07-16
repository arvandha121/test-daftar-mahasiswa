<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="wrapper">
            <div class="logo">
                <img src="https://akupintar.id/documents/20143/0/LOGO+POLITEKNIK+NEGERI+MALANG.png/949b5c7d-1fd2-121d-c1ad-f275911cb955?version=1.0&t=1519104037264&imageThumbnail=1" alt="">
            </div>
            <div class="text-center mt-4 name">
                Admin Polinema
            </div>
            <form class="p-3 mt-3" method="POST" action="{{ url('/login/check') }}">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="password" placeholder="Password" value="Password121">
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                Don't have accounts? <a href="#">Sign up</a>
            </div>
        </div>
    </div>
    <footer class="footer">(c) Copyright 2023 - Arvandha121</footer>
</body>
</html>