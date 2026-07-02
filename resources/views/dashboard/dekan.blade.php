@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Dashboard Dekan
</h2>

<div class="alert alert-success">
Selamat datang,
<b>{{ auth()->user()->name }}</b>
</div>

<div class="row">

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Total Pengajuan</h5>
<h2>{{ $totalPengajuan }}</h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Menunggu Verifikasi</h5>
<h2>{{ $pendingDekan }}</h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Disetujui</h5>
<h2>{{ $disetujui }}</h2>
</div>
</div>
</div>


<div class="col-md-3">
<div class="card shadow">
<div class="card-body text-center">
<h5>Revisi/Ditolak</h5>
<h2>{{ $ditolak }}</h2>
</div>
</div>
</div>

</div>

<div class="mt-4">

<a href="{{ route('dekan.pengajuan.index') }}"
class="btn btn-primary">

Kelola Pengajuan

</a>

<a href="{{ route('dekan.riwayat') }}"
class="btn btn-success">

Riwayat

</a>

</div>

@endsection