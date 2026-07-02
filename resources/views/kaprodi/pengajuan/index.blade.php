@extends('layouts.app')

@section('content')

<h2 class="mb-4">Verifikasi Pengajuan Banding UKT</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>

                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>

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

                        @if($pengajuan->status == 'Pending Kaprodi')

                        <span class="badge bg-warning">
                        Pending Kaprodi
                        </span>

                        @elseif($pengajuan->status == 'Pending Dekan')

                        <span class="badge bg-primary">
                        Pending Dekan
                        </span>

                        @elseif($pengajuan->status == 'Revisi')

                        <span class="badge bg-secondary">
                        Revisi
                        </span>

                        @elseif($pengajuan->status == 'Ditolak')

                        <span class="badge bg-danger">
                        Ditolak
                        </span>

                        @else

                        <span class="badge bg-success">
                        {{ $pengajuan->status }}
                        </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('kaprodi.pengajuan.show',$pengajuan) }}"
                           class="btn btn-primary btn-sm">

                            Detail

                        </a>

                    </td>

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