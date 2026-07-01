@extends('layouts.app')

@section('content')

<h2 class="mb-4">Detail Pengajuan Banding UKT</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="220">Nama Mahasiswa</th>
                <td>{{ $pengajuan->user->name }}</td>
            </tr>

            <tr>
                <th>Semester</th>
                <td>{{ $pengajuan->semester }}</td>
            </tr>

            <tr>
    <th>Tanggal Pengajuan</th>
    <td>
        {{ $pengajuan->created_at->format('d F Y') }}
        pukul
        {{ $pengajuan->created_at->format('H:i') }} WIB
    </td>
</tr>

            <tr>
                <th>UKT Saat Ini</th>
                <td>
                    Rp {{ number_format($pengajuan->ukt_sekarang,0,',','.') }}
                </td>
            </tr>

            <tr>
                <th>UKT Diajukan</th>
                <td>
                    Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}
                </td>
            </tr>

            <tr>
                <th>Alasan</th>
                <td>{{ $pengajuan->alasan }}</td>
            </tr>

            <tr>
                <th>Bukti Pendukung</th>
                <td>

                    @if($pengajuan->bukti)

                        <a href="{{ asset('storage/'.$pengajuan->bukti) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm">
                            Lihat Bukti
                        </a>

                    @else

                        <span class="text-danger">
                            Tidak ada file
                        </span>

                    @endif

                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <span class="badge bg-warning">
                        {{ $pengajuan->status }}
                    </span>
                </td>
            </tr>

        </table>

        <div class="mt-4">

            @if($pengajuan->status == 'Pending TU')

                <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="Pending Kaprodi">

                    <button class="btn btn-success">
                        Setujui
                    </button>

                </form>

                <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="Revisi">

                    <button class="btn btn-warning">
                        Revisi
                    </button>

                </form>

                <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="Ditolak">

                    <button class="btn btn-danger">
                        Tolak
                    </button>

                </form>

            @endif

            <a href="{{ route('admin.pengajuan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection