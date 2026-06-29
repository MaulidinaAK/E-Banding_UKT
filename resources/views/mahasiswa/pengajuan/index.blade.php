@extends('layouts.app')

@section('sidebar')

<div class="list-group">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="list-group-item list-group-item-action">
        Dashboard
    </a>

    <a href="{{ route('pengajuan.index') }}"
       class="list-group-item list-group-item-action active">
        Pengajuan Banding
    </a>

    <a href="{{ route('profile.edit') }}"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Daftar Pengajuan Banding UKT</h2>

    <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">
        + Ajukan Banding
    </a>

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Semester</th>
                    <th>UKT Saat Ini</th>
                    <th>UKT Diajukan</th>
                    <th>Bukti</th>
                    <th>Status</th> 
                </tr>

            </thead>

            <tbody>

                @forelse($pengajuans as $pengajuan)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $pengajuan->semester }}</td>

                        <td>Rp {{ number_format($pengajuan->ukt_sekarang,0,',','.') }}</td>

                        <td>Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}</td>

                        <td>
                        @if($pengajuan->bukti)
                            <a href="{{ asset('storage/' . $pengajuan->bukti) }}"
                            target="_blank"
                            class="btn btn-sm btn-info">
                                Lihat File
                            </a>
                        @else
                            -
                        @endif
                    </td>

                    <td>{{ $pengajuan->status }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada pengajuan.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection