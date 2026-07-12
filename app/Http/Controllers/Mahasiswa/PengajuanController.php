<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
{
    $pengajuans = Pengajuan::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('mahasiswa.pengajuan.index', compact('pengajuans'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    return view('mahasiswa.pengajuan.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   $request->validate([
    'semester' => 'required|string|max:50',
    'ukt_sekarang' => 'required|numeric',
    'ukt_pengajuan' => 'required|numeric',
    'alasan' => 'required|string',

    'ktm' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'kartu_keluarga' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'slip_gaji' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'surat_tidak_beasiswa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'tagihan_listrik_air' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'dokumen_tanggungan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'foto_rumah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    'surat_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
]);

    $ktm = $request->file('ktm')->store('dokumen', 'public');

$kartu_keluarga = $request->file('kartu_keluarga')->store('dokumen', 'public');

$slip_gaji = $request->file('slip_gaji')->store('dokumen', 'public');

$surat_tidak_beasiswa = $request->file('surat_tidak_beasiswa')->store('dokumen', 'public');

$tagihan_listrik_air = $request->file('tagihan_listrik_air')->store('dokumen', 'public');

$dokumen_tanggungan = $request->file('dokumen_tanggungan')->store('dokumen', 'public');

$foto_rumah = $request->file('foto_rumah')->store('dokumen', 'public');

$surat_pendukung = $request->file('surat_pendukung')->store('dokumen', 'public');

    Pengajuan::create([
        'user_id' => auth()->id(),
        'semester' => $request->semester,
        'ukt_sekarang' => $request->ukt_sekarang,
        'ukt_pengajuan' => $request->ukt_pengajuan,
        'alasan' => $request->alasan,
        'ktm' => $ktm,
        'kartu_keluarga' => $kartu_keluarga,
        'slip_gaji' => $slip_gaji,
        'surat_tidak_beasiswa' => $surat_tidak_beasiswa,
        'tagihan_listrik_air' => $tagihan_listrik_air,
        'dokumen_tanggungan' => $dokumen_tanggungan,
        'foto_rumah' => $foto_rumah,
        'surat_pendukung' => $surat_pendukung,
        'status' => 'Pending TU',
    ]);

    return redirect()
        ->route('pengajuan.index')
        ->with('success', 'Pengajuan berhasil dikirim.');
}

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan): View
{
    // Pastikan mahasiswa hanya bisa melihat pengajuannya sendiri
    if ($pengajuan->user_id != auth()->id()) {
        abort(403);
    }

    return view('mahasiswa.pengajuan.show', compact('pengajuan'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
