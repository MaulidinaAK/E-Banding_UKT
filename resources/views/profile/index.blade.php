@extends('layouts.app')

@section('content')

<h2>Profil Saya</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

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