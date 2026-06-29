@extends('layouts.app')

@section('sidebar')

<div class="list-group">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="list-group-item list-group-item-action">
        Dashboard
    </a>

    <a href="{{ route('pengajuan.create') }}"
       class="list-group-item list-group-item-action">
        Ajukan Banding
    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="list-group-item list-group-item-action active">
        Riwayat Pengajuan
    </a>

    <a href="{{ route('profile.edit') }}"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

@endsection

@section('content')

<h2 class="mb-4">Riwayat Pengajuan Banding</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('pengajuan.create') }}" class="btn btn-primary mb-3">
    + Ajukan Banding
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Semester</th>
            <th>UKT Saat Ini</th>
            <th>UKT Diajukan</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($pengajuans as $pengajuan)

        <tr>
            <td>{{ $pengajuan->semester }}</td>
            <td>Rp {{ number_format($pengajuan->ukt_sekarang,0,',','.') }}</td>
            <td>Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}</td>
            <td>{{ $pengajuan->status }}</td>
        </tr>

    @empty

        <tr>
            <td colspan="4" class="text-center">
                Belum ada pengajuan.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection