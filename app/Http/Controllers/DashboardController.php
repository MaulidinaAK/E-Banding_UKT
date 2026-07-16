<?php

namespace App\Http\Controllers;

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
}