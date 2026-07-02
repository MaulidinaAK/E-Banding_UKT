@extends('layouts.app')

@section('content')

<div class="list-group mb-4">

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

<h2 class="mb-4">Form Pengajuan Banding UKT</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pengajuan.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">UKT Saat Ini</label>
                <input type="number" name="ukt_sekarang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">UKT yang Diajukan</label>
                <input type="number" name="ukt_pengajuan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alasan Banding</label>
                <textarea name="alasan" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Bukti Pendukung</label>
                <input type="file" name="bukti" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <button class="btn btn-success">
                Simpan Pengajuan
            </button>

            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection