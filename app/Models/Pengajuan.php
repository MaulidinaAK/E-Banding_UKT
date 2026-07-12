<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    protected $fillable = [
    'user_id',

    'semester',
    'ukt_sekarang',
    'ukt_pengajuan',
    'alasan',

    'ktm',
    'kartu_keluarga',
    'slip_gaji',
    'surat_tidak_beasiswa',
    'tagihan_listrik_air',
    'dokumen_tanggungan',
    'foto_rumah',
    'surat_pendukung',

    'status',

    'kaprodi_verified_at',
    'dekan_verified_at',
    'catatan',
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}