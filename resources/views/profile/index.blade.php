@extends('layouts.app')

@section('content')

<h2>Profil Saya</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="text-center mb-3">

    @if($user->photo)

<img src="{{ $user->photo_url }}"
     width="120"
     height="120"
     class="rounded-circle mb-3"
     style="object-fit:cover;">
    @else
        <div style="
            width:120px;
            height:120px;
            border-radius:50%;
            background:#ddd;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-size:12px;
            color:#666;
        ">
            No Photo
        </div>
    @endif

</div>

<div class="card">

    <div class="card-body">


<h5>{{ $user->name }}</h5>

        <table class="table">

            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            @if($user->role->name == 'Mahasiswa')

            <tr>
                <th>NIM</th>
                <td>{{ $user->nim }}</td>
            </tr>

            <tr>
                <th>Program Studi</th>
                <td>{{ $user->prodi }}</td>
            </tr>

            <tr>
                <th>Fakultas</th>
                <td>{{ $user->fakultas }}</td>
            </tr>

            <tr>
                <th>Semester</th>
                <td>{{ $user->semester }}</td>
            </tr>

            @endif

            @if($user->role->name != 'Mahasiswa')

            <tr>
                <th>NIP</th>
                <td>{{ $user->nip }}</td>
            </tr>

            @endif

            <tr>
                <th>No HP</th>
                <td>{{ $user->no_hp }}</td>
            </tr>

        </table>

        <a href="{{ route('profile.edit') }}"
   class="btn btn-primary">

    Edit Profil

</a>

    </div>

</div>

@endsection