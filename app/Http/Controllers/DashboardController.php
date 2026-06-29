<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Pengajuan;

class DashboardController extends Controller
{
    public function mahasiswa(): View
    {
        $totalPengajuan = Pengajuan::where('user_id', auth()->id())->count();

        $statusTerakhir = Pengajuan::where('user_id', auth()->id())
            ->latest()
            ->value('status');

        return view('dashboard.mahasiswa', compact(
            'totalPengajuan',
            'statusTerakhir'
        ));
    }

    public function admin(): View
    {
        return view('dashboard.admin');
    }

    public function kaprodi(): View
    {
        return view('dashboard.kaprodi');
    }

    public function dekan(): View
    {
        return view('dashboard.dekan');
    }
}