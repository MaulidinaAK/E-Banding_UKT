@extends('layouts.app')

@section('content')

<h2 class="mb-4">Detail Pengajuan Banding UKT</h2>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <tr>
                <th width="250">Semester</th>
                <td>{{ $pengajuan->semester }}</td>
            </tr>

            <tr>
                <th>UKT Saat Ini</th>
                <td>
                    Rp {{ number_format($pengajuan->ukt_sekarang,0,',','.') }}
                </td>
            </tr>

            <tr>
                <th>UKT yang Diajukan</th>
                <td>
                    Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <span class="badge bg-primary">
                        {{ $pengajuan->status }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>Tanggal Pengajuan</th>
                <td>
                    {{ $pengajuan->created_at->format('d F Y H:i') }} WIB
                </td>
            </tr>

        </table>

    </div>

</div>

{{-- Alasan Pengajuan --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">

        <i class="bi bi-chat-left-text me-2"></i>

        Alasan Pengajuan

    </div>

    <div class="card-body">

        <p class="mb-0">
            {{ $pengajuan->alasan }}
        </p>

    </div>

</div>

   @if($pengajuan->catatan)

<div class="card shadow-sm mb-4 border-start border-4 border-warning">

    <div class="card-header bg-warning">

        <i class="bi bi-exclamation-circle-fill me-2"></i>

        Catatan Verifikator

    </div>

    <div class="card-body">

        <div class="d-flex">

            <div class="me-3">

                <i class="bi bi-chat-square-text-fill text-warning fs-3"></i>

            </div>

            <div>

                <p class="mb-0">

                    {{ $pengajuan->catatan }}

                </p>

            </div>

        </div>

    </div>

</div>

@endif

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            Dokumen Pendukung
        </div>

        <div class="card-body">

        @php
            $dokumen = [
                'Kartu Tanda Mahasiswa (KTM)' => $pengajuan->ktm,
                'Kartu Keluarga' => $pengajuan->kartu_keluarga,
                'Slip Gaji Orang Tua' => $pengajuan->slip_gaji,
                'Surat Tidak Menerima Beasiswa' => $pengajuan->surat_tidak_beasiswa,
                'Tagihan Listrik / Air' => $pengajuan->tagihan_listrik_air,
                'Dokumen Jumlah Tanggungan' => $pengajuan->dokumen_tanggungan,
                'Foto Rumah' => $pengajuan->foto_rumah,
                'Surat Pendukung Lainnya' => $pengajuan->surat_pendukung,
            ];
        @endphp

       <div class="row g-3">

    @foreach($dokumen as $nama => $file)

        <div class="col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="fw-semibold mb-1">
                            <i class="bi bi-file-earmark-text text-primary me-2"></i>
                            {{ $nama }}
                        </h6>

                        @if($file)

                            <small class="text-success">
                                <i class="bi bi-check-circle-fill"></i>
                                Dokumen tersedia
                            </small>

                        @else

                            <small class="text-danger">
                                <i class="bi bi-x-circle-fill"></i>
                                Belum diunggah
                            </small>

                        @endif

                    </div>

                    @if($file)

                        <div class="d-flex gap-2">

                            <a href="{{ asset('storage/'.$file) }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm">

                                <i class="bi bi-eye"></i>

                            </a>

                            <a href="{{ asset('storage/'.$file) }}"
                               download
                               class="btn btn-outline-success btn-sm">

                                <i class="bi bi-download"></i>

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    @endforeach

</div>

    </div>

</div>

<div class="mt-4">

    <a href="{{ route('pengajuan.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

@endsection