@extends('layouts.app')

@section('content')

<div class="mb-3">

    <a href="{{ route('admin.dashboard') }}"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

<h2 class="mb-4">Daftar Pengajuan Banding UKT</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

          <tbody>

@forelse($pengajuans as $pengajuan)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $pengajuan->user->name }}</td>

    <td>{{ $pengajuan->semester }}</td>

    <td>
        Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}
    </td>

    <td>
        {{ $pengajuan->created_at->format('d M Y') }}
        <br>
        <small class="text-muted">
            {{ $pengajuan->created_at->format('H:i') }} WIB
        </small>
    </td>

    <td>

@if($pengajuan->status == 'Pending TU')

<span class="badge bg-warning">
    Pending TU
</span>

@elseif($pengajuan->status == 'Pending Kaprodi')

<span class="badge bg-info">
    Pending Kaprodi
</span>

@elseif($pengajuan->status == 'Pending Dekan')

<span class="badge bg-primary">
    Pending Dekan
</span>

@elseif($pengajuan->status == 'Disetujui')

<span class="badge bg-success">
    Disetujui
</span>

@elseif($pengajuan->status == 'Revisi')

<span class="badge bg-secondary">
    Revisi
</span>

@else

<span class="badge bg-danger">
    Ditolak
</span>

@endif

</td>

    <td>

        <a href="{{ route('admin.pengajuan.show', $pengajuan) }}"
           class="btn btn-primary btn-sm">
            Detail
        </a>

    </td>

</tr>

@empty

<tr>
    <td colspan="7" class="text-center">
        Belum ada pengajuan.
    </td>
</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

@endsection