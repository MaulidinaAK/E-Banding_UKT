@extends('layouts.app')

@section('content')

<h2 class="mb-4">Riwayat Verifikasi Kaprodi</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-success">

                <tr>

                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>

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

                        <span class="badge bg-success">

                            {{ $pengajuan->status }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada riwayat verifikasi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection