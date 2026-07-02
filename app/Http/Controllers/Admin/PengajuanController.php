<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengajuanController extends Controller
{
    public function index(): View
    {
        $pengajuans = Pengajuan::with('user')
            ->latest()
            ->get();

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function show(Pengajuan $pengajuan): View
    {
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function updateStatus(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $pengajuan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pengajuan.show', $pengajuan)
            ->with('success', 'Status berhasil diperbarui.');
    }

    public function riwayat(): View
{
    $pengajuans = Pengajuan::with('user')
        ->where(function ($query) {
            $query->where('status', 'Pending Kaprodi')
                  ->orWhere(function ($q) {
                      $q->whereIn('status', ['Revisi', 'Ditolak'])
                        ->whereNull('kaprodi_verified_at');
                  });
        })
        ->latest()
        ->get();

    return view('admin.pengajuan.riwayat', compact('pengajuans'));
}

    public function kaprodiIndex(): View
    {
        $pengajuans = Pengajuan::with('user')
            ->where('status', 'Pending Kaprodi')
            ->latest()
            ->get();

        return view('kaprodi.pengajuan.index', compact('pengajuans'));
    }

    public function adminDashboard(): View
{
    $totalPengajuan = Pengajuan::count();

    $pending = Pengajuan::whereIn('status', [
        'Pending TU',
        'Pending Kaprodi',
        'Pending Dekan'
    ])->count();

    $disetujui = Pengajuan::where('status', 'Disetujui')->count();

    $ditolak = Pengajuan::where('status', 'Ditolak')->count();

    return view('dashboard.admin', compact(
        'totalPengajuan',
        'pending',
        'disetujui',
        'ditolak'
    ));
}

    public function kaprodiShow(Pengajuan $pengajuan): View
    {
        return view('kaprodi.pengajuan.show', compact('pengajuan'));
    }

    public function kaprodiUpdateStatus(Request $request, Pengajuan $pengajuan)
{
    $request->validate([
        'status' => 'required|in:Pending Dekan,Revisi,Ditolak',
    ]);

    $pengajuan->update([
        'status' => $request->status,
        'kaprodi_verified_at' => now(),
    ]);

    return redirect()
        ->route('kaprodi.pengajuan.show', $pengajuan)
        ->with('success', 'Status berhasil diperbarui.');
}

    public function kaprodiRiwayat(): View
{
    $pengajuans = Pengajuan::with('user')
        ->whereNotNull('kaprodi_verified_at')
        ->latest()
        ->get();

    return view('kaprodi.pengajuan.riwayat', compact('pengajuans'));
}

public function kaprodiDashboard(): View
{
    $totalPengajuan = Pengajuan::whereNotNull('kaprodi_verified_at')->count();

    $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')->count();

    $revisi = Pengajuan::where('status', 'Revisi')->count();

    $ditolak = Pengajuan::where('status', 'Ditolak')->count();

    $approved = Pengajuan::where('status', 'Pending Dekan')->count();

    return view('dashboard.kaprodi', compact(
        'totalPengajuan',
        'pendingKaprodi',
        'revisi',
        'ditolak',
        'approved'
    ));
}

}