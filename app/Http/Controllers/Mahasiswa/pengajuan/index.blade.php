@extends('layouts.app')


<a href="{{ route('pengajuan.create') }}" class="btn btn-primary mb-3">
    + Ajukan Banding
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Semester</th>
            <th>UKT Saat Ini</th>
            <th>UKT Diajukan</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($pengajuans as $pengajuan)

        <tr>
            <td>{{ $pengajuan->semester }}</td>
            <td>Rp {{ number_format($pengajuan->ukt_sekarang,0,',','.') }}</td>
            <td>Rp {{ number_format($pengajuan->ukt_pengajuan,0,',','.') }}</td>
            <td>{{ $pengajuan->status }}</td>
        </tr>

    @empty

        <tr>
            <td colspan="4" class="text-center">
                Belum ada pengajuan.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection