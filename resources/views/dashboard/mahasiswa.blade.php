@extends('layouts.app')

@section('sidebar')

<div class="list-group">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="list-group-item list-group-item-action active">
        Dashboard
    </a>

    <a href="{{ route('pengajuan.create') }}"
       class="list-group-item list-group-item-action">
        Ajukan Banding
    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="list-group-item list-group-item-action">
        Riwayat Pengajuan
    </a>

    <a href="{{ route('profile.show') }}"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

@endsection


@section('content')

<h2 class="mb-4">
    Dashboard Mahasiswa
</h2>

<div class="alert alert-success">
    Selamat datang, <strong>{{ auth()->user()->name }}</strong>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Pengajuan</h5>
                <h2>{{ $totalPengajuan }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Status Terakhir</h5>

                <h2>
                   @switch($pengajuanTerakhir->status)

    @case('Pending TU')
       Verifikasi TU
        @break

    @case('Pending Kaprodi')
         Verifikasi Kaprodi
        @break

    @default
        {{ $pengajuanTerakhir->status }}

@endswitch
                </h2>
            </div>
        </div>
    </div>

</div>

@endsection