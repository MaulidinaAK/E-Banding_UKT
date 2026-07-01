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
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.pengajuan.show', $pengajuan)
            ->with('success', 'Status berhasil diperbarui.');
    }

    public function kaprodiIndex(): View
    {
        $pengajuans = Pengajuan::with('user')
            ->where('status', 'Pending Kaprodi')
            ->latest()
            ->get();

        return view('kaprodi.pengajuan.index', compact('pengajuans'));
    }

    public function kaprodiShow(Pengajuan $pengajuan): View
    {
        return view('kaprodi.pengajuan.show', compact('pengajuan'));
    }

    public function kaprodiUpdateStatus(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $pengajuan->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('kaprodi.pengajuan.show', $pengajuan)
            ->with('success', 'Status berhasil diperbarui.');
    }

    public function kaprodiRiwayat(): View
{
    $pengajuans = Pengajuan::with('user')
        ->whereIn('status', [
            'Revisi',
            'Ditolak',
            'Disetujui'
        ])
        ->latest()
        ->get();

    return view('kaprodi.pengajuan.riwayat', compact('pengajuans'));
}

}