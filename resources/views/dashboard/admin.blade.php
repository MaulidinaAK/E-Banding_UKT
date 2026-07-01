@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard Admin TU</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong>{{ auth()->user()->name }}</strong>
</div>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6>Total Pengajuan</h6>
                <h2>{{ $totalPengajuan }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6>Verifikasi TU</h6>
                <h2>{{ $pendingTU }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6>Verifikasi Kaprodi</h6>
                <h2>{{ $pendingKaprodi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h6>Revisi / Ditolak</h6>
                <h2>{{ $revisi + $ditolak }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="mt-4">

    <a href="{{ route('admin.pengajuan.index') }}"
       class="btn btn-primary">

        Kelola Pengajuan

    </a>

</div>

@endsection