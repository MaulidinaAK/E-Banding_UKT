<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    
public function mahasiswa(): View
{
    $totalPengajuan = Pengajuan::where('user_id', auth()->id())->count();

    $pengajuanTerakhir = Pengajuan::where('user_id', auth()->id())
        ->latest()
        ->first();

    return view('dashboard.mahasiswa', compact(
        'totalPengajuan',
        'pengajuanTerakhir'
    ));
}

    public function admin(): View
    {
        $totalPengajuan = Pengajuan::count();

        $pendingTU = Pengajuan::where('status', 'Pending TU')->count();
        $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')->count();
        $revisi = Pengajuan::where('status', 'Revisi')->count();
        $ditolak = Pengajuan::where('status', 'Ditolak')->count();

        return view('dashboard.admin', compact(
            'totalPengajuan',
            'pendingTU',
            'pendingKaprodi',
            'revisi',
            'ditolak'
        ));
    }

    public function kaprodi(): View
{
    $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')->count();

    $pendingDekan = Pengajuan::where('status', 'Disetujui')->count();

    $revisi = Pengajuan::where('status', 'Revisi')->count();

    $ditolak = Pengajuan::where('status', 'Ditolak')->count();

    return view('dashboard.kaprodi', compact(
        'pendingKaprodi',
        'pendingDekan',
        'revisi',
        'ditolak'
    ));
}

}