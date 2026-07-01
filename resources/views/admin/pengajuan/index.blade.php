@extends('layouts.app')

@section('content')

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
        @switch($pengajuan->status)

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