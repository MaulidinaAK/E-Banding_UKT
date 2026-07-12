@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard Admin TU</h2>

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
            <i class="bi bi-inbox stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card orange">
            <div>
                <h6>Pending Verifikasi</h6>
                <h3>{{ $pending }}</h3>
            </div>
            <i class="bi bi-hourglass-split stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card green">
            <div>
                <h6>Disetujui</h6>
                <h3>{{ $disetujui }}</h3>
            </div>
            <i class="bi bi-check-circle stat-icon"></i>
        </div>
    </div>

</div>

<div class="mt-4">

    <a href="{{ route('admin.pengajuan.index') }}"
       class="btn btn-primary">

        Kelola Pengajuan

    </a>

    <a href="{{ route('admin.riwayat') }}"
   class="btn btn-success">
    Riwayat
</a>

</div>

@endsection