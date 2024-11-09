<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('PageTitle')</title>
  </head>
  <body bgcolor="pink">
    @hasSection('no-navbar')

    @else
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Luminux</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('game.index') ? 'active' : '' }}" aria-current="page" href="{{ route('game.index') }}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('plataform.index') ? 'active' : '' }}" href="{{ route('plataform.index') }}">Plataforma</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('developer.index') ? 'active' : '' }}" href="{{ route('developer.index') }}">Desarrollador</a>
            </li>
            
          </ul>
          <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item">
                <span class="navbar-text text-white">
                  <a class="nav-link-user"  href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a>
                  
                </span>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('developer.index') ? 'active' : '' }}"  href="{{ route('logout') }}">Cerrar Sesión</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    @endif
    <div class="container mt-4">
        @yield('Content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ebc9ff866.js" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0
