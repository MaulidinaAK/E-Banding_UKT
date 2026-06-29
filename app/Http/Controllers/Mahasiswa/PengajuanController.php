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
        'bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $bukti = null;

    if ($request->hasFile('bukti')) {
        $bukti = $request->file('bukti')->store('bukti', 'public');
    }

    Pengajuan::create([
        'user_id' => auth()->id(),
        'semester' => $request->semester,
        'ukt_sekarang' => $request->ukt_sekarang,
        'ukt_pengajuan' => $request->ukt_pengajuan,
        'alasan' => $request->alasan,
        'bukti' => $bukti,
        'status' => 'Pending TU',
    ]);

    return redirect()
        ->route('pengajuan.index')
        ->with('success', 'Pengajuan berhasil dikirim.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
