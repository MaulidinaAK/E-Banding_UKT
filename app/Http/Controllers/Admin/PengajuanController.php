<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengajuanController extends Controller
{
    public function index(Request $request): View
{
    $query = Pengajuan::with('user');

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $pengajuans = $query
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
        'status' => 'required|in:Pending Kaprodi,Revisi,Ditolak',
        'catatan' => [
            'nullable',
            'string',
            'required_if:status,Revisi,Ditolak',
        ],
    ], [
        'catatan.required_if' => 'Catatan wajib diisi jika pengajuan direvisi atau ditolak.',
    ]);

    $pengajuan->update([
        'status' => $request->status,
        'catatan' => $request->catatan,
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

    $revisi = Pengajuan::where('status', 'Revisi')->count();

    return view('dashboard.admin', compact(
    'totalPengajuan',
    'pending',
    'ditolak',
    'revisi'
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
        'catatan' => [
            'nullable',
            'string',
            'required_if:status,Revisi,Ditolak',
        ],
    ], [
        'catatan.required_if' => 'Catatan wajib diisi jika pengajuan direvisi atau ditolak.',
    ]);

    $pengajuan->update([
        'status' => $request->status,
        'catatan' => $request->catatan,
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

    $approved = Pengajuan::where('status', 'Pending Dekan')
        ->whereNotNull('kaprodi_verified_at')
        ->count();

    $revisi = Pengajuan::where('status', 'Revisi')
        ->whereNotNull('kaprodi_verified_at')
        ->count();

    $ditolak = Pengajuan::where('status', 'Ditolak')
        ->whereNotNull('kaprodi_verified_at')
        ->count();

    return view('dashboard.kaprodi', compact(
        'totalPengajuan',
        'pendingKaprodi',
        'approved',
        'revisi',
        'ditolak'
    ));
}

}