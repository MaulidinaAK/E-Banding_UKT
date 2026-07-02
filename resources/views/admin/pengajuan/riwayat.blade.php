@extends('layouts.app')

@section('content')

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

                        <span class="badge bg-secondary">

                            {{ $pengajuan->status }}

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