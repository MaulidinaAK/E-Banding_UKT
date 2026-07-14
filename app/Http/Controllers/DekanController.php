<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DekanController extends Controller
{
    /**
     * Daftar pengajuan yang menunggu verifikasi Dekan
     */
    public function index(): View
    {
        $pengajuans = Pengajuan::with('user')
    ->whereNotNull('kaprodi_verified_at')
    ->where('status', 'Pending Dekan')
    ->latest()
    ->get();

        return view('dekan.pengajuan.index', compact('pengajuans'));
    }

    /**
     * Detail pengajuan
     */
    public function show(Pengajuan $pengajuan): View
    {
        return view('dekan.pengajuan.show', compact('pengajuan'));
    }

    /**
     * Riwayat verifikasi Dekan
     */
    public function riwayat(): View
    {
        $pengajuans = Pengajuan::with('user')
            ->whereNotNull('dekan_verified_at')
            ->latest()
            ->get();

        return view('dekan.pengajuan.riwayat', compact('pengajuans'));
    }

    /**
     * Update status oleh Dekan
     */
    public function updateStatus(Request $request, Pengajuan $pengajuan)
{
    $request->validate([
        'status' => 'required|in:Disetujui,Revisi,Ditolak',
        'catatan' => 'nullable|string'
    ]);

    $pengajuan->update([
        'status' => $request->status,
        'catatan' => $request->catatan,
        'dekan_verified_at' => now(),
    ]);

    return redirect()
        ->route('dekan.pengajuan.show', $pengajuan)
        ->with('success', 'Status berhasil diperbarui.');
}

    public function dekanDashboard(): View
{

     $totalPengajuan = Pengajuan::whereNotNull('dekan_verified_at')->count();

    $pendingFinal = Pengajuan::where('status', 'Pending Dekan')->count();

    $approvedFinal = Pengajuan::where('status', 'Disetujui')
        ->whereNotNull('dekan_verified_at')
        ->count();

    $revisiFinal = Pengajuan::where('status', 'Revisi')
        ->whereNotNull('dekan_verified_at')
        ->count();

    $rejected = Pengajuan::where('status', 'Ditolak')
        ->whereNotNull('dekan_verified_at')
        ->count();

    

    return view('dashboard.dekan', compact(
        'totalPengajuan',
        'pendingFinal',
        'approvedFinal',
        'revisiFinal',
        'rejected'
    ));
}
}

