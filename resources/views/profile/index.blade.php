@extends('layouts.app')

@section('content')

@php
    $dashboard = match($user->role->name) {
        'Mahasiswa' => 'mahasiswa.dashboard',
        'Admin TU' => 'admin.dashboard',
        'Kaprodi' => 'kaprodi.dashboard',
        'Dekan' => 'dekan.dashboard',
        default => 'profile.show'
    };
@endphp


<div class="mb-3">

    <a href="{{ route($dashboard) }}"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>



<h2 class="mb-4">
    Profil Saya
</h2>


@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif



<div class="text-center mb-4">


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
            color:#666;
        ">

            No Photo

        </div>

    @endif


</div>



<div class="card shadow-sm">

<div class="card-body">


<h5 class="fw-bold">
    {{ $user->name }}
</h5>


<small class="text-muted">
    {{ $user->role->name }}
</small>


<hr>



<table class="table">


<tr>

<th width="200">
    Email
</th>

<td>
    {{ $user->email }}
</td>

</tr>




@if($user->role->name == 'Mahasiswa')


<tr>

<th>
    NIM
</th>

<td>
    {{ $user->nim }}
</td>

</tr>


<tr>

<th>
    Program Studi
</th>

<td>
    {{ $user->prodi }}
</td>

</tr>


<tr>

<th>
    Fakultas
</th>

<td>
    {{ $user->fakultas }}
</td>

</tr>


<tr>

<th>
    Semester
</th>

<td>
    {{ $user->semester }}
</td>

</tr>



@endif





@if(in_array($user->role->name,['Admin TU','Kaprodi','Dekan']))


<tr>

<th>
    NIP
</th>

<td>
    {{ $user->nip }}
</td>

</tr>


@endif





@if(in_array($user->role->name,['Admin TU','Kaprodi','Dekan']))


<tr>

<th>
    Fakultas
</th>

<td>
    {{ $user->fakultas }}
</td>

</tr>


@endif





@if($user->role->name == 'Kaprodi')


<tr>

<th>
    Program Studi
</th>

<td>
    {{ $user->prodi }}
</td>

</tr>


@endif





<tr>

<th>
    No HP
</th>

<td>
    {{ $user->no_hp }}
</td>

</tr>



</table>



<a href="{{ route('profile.edit') }}"
   class="btn btn-primary">

    <i class="bi bi-pencil"></i>
    Edit Profil

</a>



</div>

</div>


@endsection