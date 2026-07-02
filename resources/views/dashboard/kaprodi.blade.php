@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Dashboard Kaprodi
</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong>{{ auth()->user()->name }}</strong>
</div>

<div class="row g-3 mb-3">

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Total Pengajuan</h6>
                <h3 class="mb-0">{{ $totalPengajuan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Menunggu Verifikasi</h6>
                <h3 class="mb-0">{{ $pendingKaprodi }}</h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Pending Dekan</h6>
                <h3 class="mb-0">{{ $pendingDekan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Revisi</h6>
                <h3 class="mb-0">{{ $revisi }}</h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Ditolak</h6>
                <h3 class="mb-0">{{ $ditolak }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="mt-4">

    <a href="{{ route('kaprodi.pengajuan.index') }}"
       class="btn btn-primary">

        Verifikasi Pengajuan

    </a>

</div>

@endsection