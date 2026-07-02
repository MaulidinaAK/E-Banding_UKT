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
        $totalPengajuan = Pengajuan::whereIn('status', [
        'Pending TU',
        'Pending Kaprodi',
        'Pending Dekan',
        'Revisi',
        'Ditolak',
        'Disetujui'
    ])->count();

        $pendingTU = Pengajuan::where('status', 'Pending TU')->count();
        $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')->count();
        $revisi = Pengajuan::whereNull('kaprodi_verified_at')
        ->where('status', 'Revisi')
        ->count();
         $ditolak = Pengajuan::whereNull('kaprodi_verified_at')
        ->where('status', 'Ditolak')
        ->count();

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
    // Total pengajuan yang menjadi tanggung jawab Kaprodi
    $totalPengajuan = Pengajuan::whereIn('status', [
        'Pending Kaprodi',
        'Pending Dekan',
        'Disetujui',
        'Revisi',
        'Ditolak'
    ])->count();

    // Menunggu diperiksa Kaprodi
    $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')
        ->count();

    // Sudah diteruskan ke Dekan
    $pendingDekan = Pengajuan::where('status', 'Pending Dekan')
        ->count();

    // Pernah direvisi oleh Kaprodi
    $revisi = Pengajuan::whereNotNull('kaprodi_verified_at')
        ->where('status', 'Revisi')
        ->count();

    // Pernah ditolak Kaprodi
    $ditolak = Pengajuan::whereNotNull('kaprodi_verified_at')
        ->where('status', 'Ditolak')
        ->count();

    return view('dashboard.kaprodi', compact(
        'totalPengajuan',
        'pendingKaprodi',
        'pendingDekan',
        'revisi',
        'ditolak'
    ));
}

    public function dekan(): View
{
    // Semua pengajuan yang berhasil lolos Kaprodi
    $totalPengajuan = Pengajuan::whereNotNull('kaprodi_verified_at')
    ->count();

    // Menunggu keputusan Dekan
    $pendingDekan = Pengajuan::whereNotNull('kaprodi_verified_at')
    ->where('status','Pending Dekan')
    ->count();

    // Sudah disetujui Dekan
    $disetujui = Pengajuan::whereNotNull('dekan_verified_at')
        ->where('status', 'Disetujui')
        ->count();

    // Ditolak atau direvisi Dekan
    $ditolak = Pengajuan::whereNotNull('dekan_verified_at')
        ->whereIn('status', ['Ditolak', 'Revisi'])
        ->count();

    return view('dashboard.dekan', compact(
        'totalPengajuan',
        'pendingDekan',
        'disetujui',
        'ditolak'
    ));
}

}