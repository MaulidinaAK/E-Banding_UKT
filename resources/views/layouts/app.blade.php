<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'E-Banding UKT' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =======================
   CARD
======================= */

.card{

    border:none;

    border-radius:20px;

    box-shadow:0 10px 35px rgba(15,23,42,.06);

    transition:.25s;

}

.card:hover{

    transform:translateY(-3px);

    box-shadow:0 18px 45px rgba(15,23,42,.08);

}

/* =======================
   BUTTON
======================= */

.btn{

    border-radius:12px;

    font-weight:500;

    padding:10px 20px;

    transition:.25s;

}

.btn-primary{

    background:#2563EB;

    border:none;

}

.btn-primary:hover{

    background:#1D4ED8;

    transform:translateY(-2px);

}

.btn-success{

    background:#10B981;

    border:none;

}

.btn-danger{

    border:none;

}

.btn-warning{

    border:none;

}

.form-control{

    border-radius:14px;

    border:1px solid #E2E8F0;

    padding:12px 16px;

    box-shadow:none;

}

.form-control:focus{

    border-color:#3B82F6;

    box-shadow:0 0 0 .15rem rgba(59,130,246,.18);

}

/* =======================
   TABEL DAFTAR (CARD)
======================= */

.table-card{

    border-collapse: separate;
    border-spacing: 0 12px;

}

.table-card thead th{

    border: none;
    color: #64748B;
    font-weight: 600;
    font-size: 14px;

}

.table-card tbody tr{

    background: white;
    box-shadow: 0 4px 16px rgba(0,0,0,.04);

}

.table-card tbody td{

    vertical-align: middle;
    border: none;
    padding: 18px;

}

/* =======================
   TABEL DETAIL
======================= */

.table-detail{

    border-collapse: collapse;
    border-spacing: 0;

}

.table-detail td,
.table-detail th{

    vertical-align: middle;
    padding: 12px 16px;

}

.badge{

    border-radius:999px;

    padding:8px 14px;

    font-weight:500;

    font-size:.82rem;

}

        body{
            font-family:'Inter',sans-serif;
        }

        .navbar-custom{
            background:linear-gradient(90deg,#1e3c72,#2a5298);
            box-shadow:0 4px 20px rgba(0,0,0,.08);
        }

        .sidebar{
            background:white;
            border-right:1px solid #eef2f7;
            min-height:100vh;
        }

        .content{
            padding:35px;
        }

        .list-group-item{
            border:none;
            border-radius:12px;
            margin-bottom:8px;
            transition:.25s;
            font-weight:500;
            color:#445;
        }

        .list-group-item:hover{
            background:#edf4ff;
            color:#2a5298;
            transform:translateX(4px);
        }

        .list-group-item.active{
            background:linear-gradient(90deg,#2a5298,#4f8cff);
            border:none;
            color:white;
        }

        .card{
            border:none;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.06);
        }

        .table thead{
            background:#2a5298;
            color:white;
        }

        .table thead th{
            background:#2a5298 !important;
            color:white;
        }

        .btn-primary{
            background:#2a5298;
            border:none;
        }

        .btn-primary:hover{
            background:#1f4278;
        }

        .btn-success{
            background:#3aa969;
            border:none;
        }

        .btn-danger{
            border:none;
        }

        h2,h3,h4,h5{
            font-weight:600;
            color:#1f3358;
        }

    </style>

    <style>

.menu-item{

display:block;
padding:14px 18px;

border-radius:16px;

text-decoration:none;

font-weight:600;

color:#6d7b93;

transition:.25s;

margin-bottom:8px;

}

.menu-item:hover{

background:#edf4ff;

color:#1b4db8;

transform:translateX(6px);

}

.active-menu{

background:linear-gradient(135deg,#2456d4,#4f8dfd);

color:white !important;

box-shadow:0 8px 18px rgba(36,86,212,.30);

}

.menu-item i{
    font-size:18px;
    color:#2563EB;
}

.menu-item:hover i{
    color:#1D4ED8;
}

.active-menu i{
    color:white;
}

.status-badge{
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
    font-weight:600;
    display:inline-flex;
    align-items:center;
    gap:4px;
}

.status-success{
    background:#dcfce7;
    color:#166534;
}

.status-danger{
    background:#fee2e2;
    color:#991b1b;
}

.status-warning{
    background:#fef3c7;
    color:#92400e;
}

.status-secondary{
    background:#e5e7eb;
    color:#374151;
}

/* hover biar hidup dikit */
.status-badge:hover{
    transform:scale(1.05);
    transition:0.15s ease;
}

.sidebar-menu{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.menu-item{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px 14px;
    border-radius:10px;
    text-decoration:none;
    color:#334155;
    font-weight:500;
    transition:0.2s ease;
}

.menu-item i{
    font-size:18px;
    color:#64748b;
}

.menu-item:hover{
    background:#f1f5f9;
    transform:translateX(3px);
}

.menu-item.active{
    background:#2563eb;
    color:white;
}

.menu-item.active i{
    color:white;
}

.stat-card{
    background:white;
    border-radius:16px;
    padding:20px;
    position:relative;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    transition:0.2s ease;
    overflow:hidden;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.stat-card h6{
    font-size:13px;
    color:#64748b;
}

.stat-card h3{
    font-size:24px;
    font-weight:700;
    margin-top:5px;
}

.stat-icon{
    font-size:45px;
    position:absolute;
    right:15px;
    bottom:15px;
    opacity:0.15;
}

.stat-card.blue{
    border-left:5px solid #2563EB;
    background:#f8fbff;
}

.stat-card.green{
    border-left:5px solid #22C55E;
    background:#f7fef9;
}

.stat-card.orange{
    border-left:5px solid #F59E0B;
    background:#fffaf2;
}

.stat-card.red{
    border-left:5px solid #EF4444;
    background:#fff7f7;
}

.stat-card.purple{
    border-left:5px solid #8B5CF6;
    background:#fbf9ff;
}

.stat-card.cyan{
    border-left:5px solid #06B6D4;
    background:#f3fdff;
}


</style>

</head>

<body style="background:#F5F8FC;">

<nav
class="navbar"
style="
background:linear-gradient(135deg,#173b8c,#4f8dfd);
padding:10px 24px;
min-height:68px;
box-shadow:0 4px 15px rgba(0,0,0,.10);
">
    <div class="container-fluid">

       <span class="navbar-brand text-white fw-bold"
style="font-size:1.8rem;">
    🎓 E-Banding UKT
</span>
       @if(auth()->check())

<div class="dropdown ms-auto">

    <a
        href="#"
        class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
        data-bs-toggle="dropdown"
        aria-expanded="false">

        @if(auth()->user()->photo)

            <img
                src="{{ asset('storage/'.auth()->user()->photo) }}"
                width="42"
                height="42"
                class="rounded-circle border border-2 border-white me-2"
                style="object-fit:cover;">

        @else

            <div
                class="rounded-circle bg-white text-primary fw-bold d-flex justify-content-center align-items-center me-2"
                style="
                width:42px;
                height:42px;">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>

        @endif

        <span class="fw-semibold">
            {{ auth()->user()->name }}
        </span>

    </a>

    <ul
        class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-3">

        <li>

            <a
                class="dropdown-item py-2"
                href="{{ route('profile.show') }}">

                👤 Profil

            </a>

        </li>

        <li><hr class="dropdown-divider"></li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    class="dropdown-item text-danger py-2">

                    🚪 Logout

                </button>

            </form>

        </li>

    </ul>

</div>

@endif

    </div>
</nav>

<div class="container-fluid">
    <div class="row">

      <div class="col-lg-2 col-md-3 px-4 py-3"
style="
background:#ffffff;
border-radius:0 28px 28px 0;
box-shadow:0 8px 30px rgba(30,64,175,.08);
min-height:100vh;
">

          <div class="mb-3">

<h4
class="fw-bold"
style="
color:#1848b8;
letter-spacing:.5px;
">

MENU

</h4>

</div>
            <hr class="my-3">

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

        <div class="col-md-10 p-5">
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>