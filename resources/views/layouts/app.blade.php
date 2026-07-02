<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Banding UKT</title>

    {{-- HAPUS / MATIKAN VITE CSS --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">

        <span class="navbar-brand">E-Banding UKT</span>

        @if(auth()->check())
        <div class="ms-auto d-flex align-items-center">

            <span class="text-white me-3">
                {{ auth()->user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light btn-sm">
                    Logout
                </button>
            </form>

        </div>
        @endif

    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-white border-end min-vh-100 p-3">

            <h5>Menu</h5>
            <hr>

            @if(auth()->check() && auth()->user()->role)

                @if(auth()->user()->role->name == 'Mahasiswa')
                    @include('layouts.sidebar.mahasiswa')

                @elseif(auth()->user()->role->name == 'Admin TU')
                    @include('layouts.sidebar.admin')

                @elseif(auth()->user()->role->name == 'Kaprodi')
                    @include('layouts.sidebar.kaprodi')

                @elseif(auth()->user()->role->name == 'Dekan')
                    @include('layouts.sidebar.dekan')
                @endif

            @endif

        </div>

        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>



</body>
</html>