@extends('layouts.app')

@section('sidebar')

<div class="sidebar-menu">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="menu-item {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="{{ route('pengajuan.create') }}"
       class="menu-item {{ request()->routeIs('pengajuan.create') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-plus"></i>
        Ajukan Banding
    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="menu-item {{ request()->routeIs('pengajuan.index') ? 'active' : '' }}">
        <i class="bi bi-clock-history"></i>
        Riwayat Pengajuan
    </a>

    <a href="{{ route('profile.show') }}"
       class="menu-item {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i>
        Profil
    </a>

</div>

@endsection


@section('content')

<h2 class="mb-4">
    Dashboard Mahasiswa
</h2>

<div class="welcome-banner mb-4" style="padding: 10px 0; border-bottom: 1px solid #e2e8f0;">
    <h5 style="color: #64748b; font-size: 0.9rem; font-weight: 500; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
        <span id="greeting">Selamat Datang</span>,
    </h5>
    <h2 style="color: #1e293b; font-size: 1.75rem; font-weight: 700; margin: 0; letter-spacing: -0.02em;">
        {{ auth()->user()->name }} 👋
    </h2>
</div>

<script>
    const hour = new Date().getHours();
    let greeting = "Selamat Malam";
    if (hour < 11) greeting = "Selamat Pagi";
    else if (hour < 15) greeting = "Selamat Siang";
    else if (hour < 19) greeting = "Selamat Sore";
    document.getElementById('greeting').innerText = greeting;
</script>

<div class="row g-3">

    <div class="col-md-4">
        <div class="stat-card blue">
            <div>
                <h6>Total Pengajuan</h6>
                <h3>{{ $totalPengajuan }}</h3>
            </div>
            <i class="bi bi-file-earmark-text stat-icon"></i>
        </div>
    </div>

   <div class="col-md-4">
    <div class="stat-card card-pending">

        <div>

            <h6>Status Terakhir</h6>

            <h3>

                @if($pengajuanTerakhir)

                    @switch($pengajuanTerakhir->status)

                        @case('Pending TU')
                            Verifikasi TU
                            @break

                        @case('Pending Kaprodi')
                            Verifikasi Kaprodi
                            @break

                        @case('Pending Dekan')
                            Verifikasi Dekan
                            @break

                        @default
                            {{ $pengajuanTerakhir->status }}

                    @endswitch

                @else

                    Belum Ada Pengajuan

                @endif

            </h3>

        </div>

        <i class="bi bi-hourglass-split stat-icon"></i>

    </div>
</div>
@endsection