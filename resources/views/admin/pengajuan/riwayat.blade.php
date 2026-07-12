@extends('layouts.app')

@section('content')

<div class="mb-3">

    <a href="{{ route('admin.dashboard') }}"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

<h2 class="mb-4">
    Riwayat Verifikasi Admin TU
</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>

                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
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
    @php
        $status = $pengajuan->status;

        $badgeClass = match($status) {
            'Disetujui' => 'status-success',
            'Ditolak' => 'status-danger',
            'Pending Kaprodi', 'Pending Dekan', 'Pending TU' => 'status-warning',
            default => 'status-secondary',
        };

        $icon = match($status) {
            'Disetujui' => 'bi-check-circle-fill',
            'Ditolak' => 'bi-x-circle-fill',
            default => 'bi-hourglass-split',
        };
    @endphp

    <span class="status-badge {{ $badgeClass }}">
        <i class="bi {{ $icon }} me-1"></i>
        {{ $status }}
    </span>
</td>

                    <td>

                        <a href="{{ route('admin.pengajuan.show',$pengajuan) }}"
                           class="btn btn-primary btn-sm">

                            Detail

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada riwayat.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection