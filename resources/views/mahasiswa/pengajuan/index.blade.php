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

    <a href="{{ route('profile.show') }}"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

@endsection

@section('content')

<div class="mb-3">

    <a href="{{ route('mahasiswa.dashboard') }}"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>


<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="mb-0">
        Daftar Pengajuan Banding UKT
    </h2>


    <a href="{{ route('pengajuan.create') }}"
       class="btn btn-primary">

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

       <table class="table table-bordered table-hover table-card">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Semester</th>
                    <th>UKT Saat Ini</th>
                    <th>UKT Diajukan</th>
                    <th>Dokumen</th>
                     <th>Tanggal Pengajuan</th>
                    <th>Status</th> 
                    <th>Aksi</th>
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

    @php
        $jumlahDokumen = collect([
            $pengajuan->ktm,
            $pengajuan->kartu_keluarga,
            $pengajuan->slip_gaji,
            $pengajuan->surat_tidak_beasiswa,
            $pengajuan->tagihan_listrik_air,
            $pengajuan->dokumen_tanggungan,
            $pengajuan->foto_rumah,
            $pengajuan->surat_pendukung,
        ])->filter()->count();
    @endphp

    @if($jumlahDokumen > 0)

        <span class="badge bg-success">
            {{ $jumlahDokumen }} Dokumen
        </span>

    @else

        <span class="badge bg-danger">
            Tidak Ada
        </span>

    @endif

</td>

                      <td>
        {{ $pengajuan->created_at->format('d M Y') }}
        <br>
        <small class="text-muted">
            {{ $pengajuan->created_at->format('H:i') }} WIB
        </small>
    </td>

                    <td>@switch($pengajuan->status)

    @case('Pending TU')
        Menunggu Verifikasi TU
        @break

    @case('Pending Kaprodi')
        Menunggu Verifikasi Kaprodi
        @break

    @default
        {{ $pengajuan->status }}

@endswitch

</td>

<td>

    <a href="{{ route('pengajuan.show', $pengajuan->id) }}"
       class="btn btn-outline-primary btn-sm">

        <i class="bi bi-eye"></i>
        Detail

    </a>

</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada pengajuan.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
    
</div>

@endsection