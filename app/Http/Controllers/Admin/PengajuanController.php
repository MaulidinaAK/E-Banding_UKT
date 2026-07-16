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
    $query = Pengajuan::with('user')
        ->where('status', 'Pending TU');

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

   $data = [
    'status' => $request->status,
    'catatan' => $request->catatan,
];

if ($request->status == 'Pending Kaprodi') {
    $data['admin_verified_at'] = now();
}

$pengajuan->update($data);

    return redirect()
        ->route('admin.pengajuan.show', $pengajuan)
        ->with('success', 'Status berhasil diperbarui.');
}

   public function riwayat(): View
{
    $pengajuans = Pengajuan::with('user')
        ->whereNotNull('admin_verified_at')
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

    // Masih menunggu Admin TU
    $pending = Pengajuan::where('status', 'Pending TU')->count();

    // Semua yang pernah disetujui Admin
    $disetujui = Pengajuan::whereNotNull('admin_verified_at')->count();

    // Revisi oleh Admin
    $revisi = Pengajuan::whereNull('kaprodi_verified_at')
        ->where('status', 'Revisi')
        ->count();

    // Ditolak oleh Admin
    $ditolak = Pengajuan::whereNull('kaprodi_verified_at')
        ->where('status', 'Ditolak')
        ->count();

    return view('dashboard.admin', compact(
        'totalPengajuan',
        'pending',
        'disetujui',
        'revisi',
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
    $totalPengajuan = Pengajuan::whereNotNull('admin_verified_at')->count();

    $pendingKaprodi = Pengajuan::where('status', 'Pending Kaprodi')->count();

    // Semua yang pernah disetujui Kaprodi
    $approved = Pengajuan::whereNotNull('kaprodi_verified_at')
        ->whereIn('status', [
            'Pending Dekan',
            'Disetujui'
        ])
        ->count();

    $revisi = Pengajuan::whereNotNull('kaprodi_verified_at')
        ->where('status', 'Revisi')
        ->count();

    $ditolak = Pengajuan::whereNotNull('kaprodi_verified_at')
        ->where('status', 'Ditolak')
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