@extends('layouts.app')

@section('content')

<div class="mb-3">

    <a href="{{ route('kaprodi.dashboard') }}"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

<h2 class="mb-4">Detail Pengajuan Banding UKT</h2>

{{-- Informasi --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        Informasi Pengajuan
    </div>

    <div class="card-body">

        <table class="table table-detail mb-0">

            <tr>
                <th width="250">Nama Mahasiswa</th>
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
                <th>Status</th>
                <td>

                    @switch($pengajuan->status)

                        @case('Pending Kaprodi')
                            <span class="badge bg-warning text-dark">
                                Menunggu Verifikasi Kaprodi
                            </span>
                            @break

                        @case('Pending Dekan')
                            <span class="badge bg-info">
                                Menunggu Verifikasi Dekan
                            </span>
                            @break

                        @case('Revisi')
                            <span class="badge bg-secondary">
                                Revisi
                            </span>
                            @break

                        @case('Ditolak')
                            <span class="badge bg-danger">
                                Ditolak
                            </span>
                            @break

                        @case('Disetujui')
                            <span class="badge bg-success">
                                Disetujui
                            </span>
                            @break

                    @endswitch

                </td>
            </tr>

        </table>

    </div>

</div>


{{-- Alasan --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        Alasan Pengajuan
    </div>

    <div class="card-body">

        {{ $pengajuan->alasan }}

    </div>

</div>


{{-- Dokumen --}}
<div class="card shadow-sm mb-4">

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


{{-- Verifikasi --}}
<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        Verifikasi Pengajuan
    </div>

    <div class="card-body">

        @if($pengajuan->status != 'Pending Kaprodi')

            <div class="alert alert-info mb-3">
                <i class="bi bi-info-circle-fill me-2"></i>
                Pengajuan ini sudah diproses.
            </div>

            @if($pengajuan->catatan)

                <div class="alert alert-warning">
                    <strong>Catatan Verifikator</strong>
                    <hr>
                    {{ $pengajuan->catatan }}
                </div>

            @endif


        @endif


        @if($pengajuan->status == 'Pending Kaprodi')

            <div class="d-flex gap-2 flex-wrap">

                {{-- Setujui --}}
                <form action="{{ route('kaprodi.pengajuan.updateStatus',$pengajuan) }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <input type="hidden"
                           name="status"
                           value="Pending Dekan">

                    <button class="btn btn-success">
                        <i class="bi bi-check-circle"></i>
                        Setujui
                    </button>

                </form>

                {{-- Revisi --}}
                <button class="btn btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#modalRevisi">

                    <i class="bi bi-arrow-repeat"></i>
                    Revisi

                </button>

                {{-- Tolak --}}
                <button class="btn btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTolak">

                    <i class="bi bi-x-circle"></i>
                    Tolak

                </button>

            </div>

        @endif

    </div>

</div>


{{-- ================= MODAL REVISI ================= --}}

<div class="modal fade" id="modalRevisi" tabindex="-1">

    <div class="modal-dialog">

        <form action="{{ route('kaprodi.pengajuan.updateStatus',$pengajuan) }}"
              method="POST"
              class="modal-content">

            @csrf
            @method('PATCH')

            <input type="hidden" name="status" value="Revisi">

            <div class="modal-header">

                <h5 class="modal-title">
                    Revisi Pengajuan
                </h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <textarea
                    name="catatan"
                    class="form-control"
                    rows="5"
                    placeholder="Tuliskan alasan revisi..."
                    required></textarea>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-warning">

                    Kirim Revisi

                </button>

            </div>

        </form>

    </div>

</div>


{{-- ================= MODAL TOLAK ================= --}}

<div class="modal fade" id="modalTolak" tabindex="-1">

    <div class="modal-dialog">

        <form action="{{ route('kaprodi.pengajuan.updateStatus',$pengajuan) }}"
              method="POST"
              class="modal-content">

            @csrf
            @method('PATCH')

            <input type="hidden" name="status" value="Ditolak">

            <div class="modal-header">

                <h5 class="modal-title">
                    Tolak Pengajuan
                </h5>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <textarea
                    name="catatan"
                    class="form-control"
                    rows="5"
                    placeholder="Tuliskan alasan penolakan..."
                    required></textarea>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Batal

                </button>

                <button class="btn btn-danger">

                    Tolak

                </button>

            </div>

        </form>

    </div>

</div>

@endsection