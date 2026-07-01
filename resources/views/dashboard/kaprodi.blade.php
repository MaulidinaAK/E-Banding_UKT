@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Dashboard Kaprodi
</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong>{{ auth()->user()->name }}</strong>
</div>

<div class="row g-3">

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body text-center">

                <h5>Menunggu Verifikasi</h5>

                <h2>{{ $pendingKaprodi }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body text-center">

                <h5>Disetujui</h5>

                <h2>{{ $pendingDekan }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body text-center">

                <h5>Revisi</h5>

                <h2>{{ $revisi }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body text-center">

                <h5>Ditolak</h5>

                <h2>{{ $ditolak }}</h2>

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