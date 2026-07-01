@extends('layouts.app')

@section('sidebar')

<div class="list-group">

    @if(auth()->user()->role->name == 'Mahasiswa')

        <a href="{{ route('mahasiswa.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard
        </a>

        <a href="{{ route('pengajuan.index') }}"
           class="list-group-item list-group-item-action">
            Pengajuan Banding
        </a>

    @elseif(auth()->user()->role->name == 'Admin TU')

        <a href="{{ route('admin.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard
        </a>

        <a href="{{ route('admin.pengajuan.index') }}"
           class="list-group-item list-group-item-action">
            Daftar Pengajuan
        </a>

    @elseif(auth()->user()->role->name == 'Kaprodi')

        <a href="{{ route('kaprodi.dashboard') }}"
           class="list-group-item list-group-item-action">
            Dashboard
        </a>

        <a href="{{ route('kaprodi.pengajuan.index') }}"
           class="list-group-item list-group-item-action">
            Verifikasi Pengajuan
        </a>

        <a href="{{ route('kaprodi.riwayat') }}"
           class="list-group-item list-group-item-action">
            Riwayat
        </a>

    @endif

    <a href="{{ route('profile.show') }}"
       class="list-group-item list-group-item-action active">
        Profil
    </a>

</div>

@endsection


@section('content')

<h2 class="mb-4">Profil Saya</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">

    <div class="card-body">

        <form method="POST" action="{{ route('profile.update') }}">

            @csrf
            @method('PATCH')

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="text-center mb-4">

    <img src="https://placehold.co/150x150"
         class="rounded-circle border"
         width="150">

</div>

@if($user->role->name == 'Mahasiswa')

<div class="mb-3">
    <label class="form-label">Nama</label>

    <input
        type="text"
        name="name"
        class="form-control"
        value="{{ old('name', $user->name) }}">
</div>

<div class="mb-3">
    <label class="form-label">Email</label>

    <input
        type="email"
        name="email"
        class="form-control"
        value="{{ old('email', $user->email) }}">
</div>

<div class="mb-3">
    <label class="form-label">NIM</label>

    <input type="text"
           name="nim"
           class="form-control"
           value="{{ old('nim',$user->nim) }}">
</div>

<div class="mb-3">
    <label class="form-label">Program Studi</label>

    <input type="text"
           name="prodi"
           class="form-control"
           value="{{ old('prodi',$user->prodi) }}">
</div>

<div class="mb-3">
    <label class="form-label">Fakultas</label>

    <input type="text"
           name="fakultas"
           class="form-control"
           value="{{ old('fakultas',$user->fakultas) }}">
</div>

<div class="mb-3">
    <label class="form-label">Semester</label>

    <input type="text"
           name="semester"
           class="form-control"
           value="{{ old('semester',$user->semester) }}">
</div>

@endif

@if($user->role->name != 'Mahasiswa')

<div class="mb-3">

    <label class="form-label">NIP</label>

    <input type="text"
           name="nip"
           class="form-control"
           value="{{ old('nip',$user->nip) }}">

</div>

@endif

@if($user->role->name == 'Kaprodi')

<div class="mb-3">

    <label class="form-label">Program Studi</label>

    <input type="text"
           name="prodi"
           class="form-control"
           value="{{ old('prodi',$user->prodi) }}">

</div>

<div class="mb-3">

    <label class="form-label">Fakultas</label>

    <input type="text"
           name="fakultas"
           class="form-control"
           value="{{ old('fakultas',$user->fakultas) }}">

</div>

@endif

<div class="mb-3">

    <label class="form-label">Nomor HP</label>

    <input type="text"
           name="no_hp"
           class="form-control"
           value="{{ old('no_hp',$user->no_hp) }}">

</div>

<button class="btn btn-primary">
    Simpan Perubahan
</button>

</form>

</div>

</div>

@endsection