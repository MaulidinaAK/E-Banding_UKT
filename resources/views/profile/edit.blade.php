@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Profil</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST"
              action="{{ route('profile.update') }}"
              enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <div class="text-center mb-4">

                <img src="{{ $user->photo_url }}"
                     class="rounded-circle border shadow"
                     width="160"
                     height="160"
                     style="object-fit:cover;">

                <h4 class="mt-3">
                    {{ $user->name }}
                </h4>

                <small class="text-muted">
                    {{ $user->role->name }}
                </small>

            </div>

            

            <div class="mb-4">
                <label class="form-label">
                    Foto Profil
                </label>

                <input
                    type="file"
                    name="photo"
                    class="form-control">

                <small class="text-muted">
                    Format JPG / PNG maksimal 2 MB
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name',$user->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email',$user->email) }}">
            </div>

            @if($user->role->name == 'Mahasiswa')

                <div class="mb-3">
                    <label class="form-label">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="{{ old('nim',$user->nim) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        class="form-control"
                        value="{{ old('prodi',$user->prodi) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Fakultas
                    </label>

                    <input
                        type="text"
                        name="fakultas"
                        class="form-control"
                        value="{{ old('fakultas',$user->fakultas) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Semester
                    </label>

                    <input
                        type="text"
                        name="semester"
                        class="form-control"
                        value="{{ old('semester',$user->semester) }}">
                </div>

            @endif

            @if($user->role->name != 'Mahasiswa')

                <div class="mb-3">
                    <label class="form-label">
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        value="{{ old('nip',$user->nip) }}">
                </div>

            @endif

            @if($user->role->name == 'Kaprodi')

                <div class="mb-3">
                    <label class="form-label">
                        Program Studi
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        class="form-control"
                        value="{{ old('prodi',$user->prodi) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Fakultas
                    </label>

                    <input
                        type="text"
                        name="fakultas"
                        class="form-control"
                        value="{{ old('fakultas',$user->fakultas) }}">
                </div>

            @endif

            <div class="mb-3">
                <label class="form-label">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp',$user->no_hp) }}">
            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <a href="{{ route('profile.show') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>

@endsection