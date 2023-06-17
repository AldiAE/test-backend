<!DOCTYPE html>
<html>
<head>
    <title>App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Pencatatan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) == 'kategori' ? 'active' : '' }}" href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}" href="{{ route('transaksi.index') }}">Transaksi</a>
                </li>
              </ul>
            </div>
          </div>
    </nav>
    
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>