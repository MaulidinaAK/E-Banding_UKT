<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {

            // Hapus kolom lama
            $table->dropColumn('bukti');

            // Dokumen Persyaratan
            $table->string('ktm');
            $table->string('kartu_keluarga');
            $table->string('slip_gaji');
            $table->string('surat_tidak_beasiswa');
            $table->string('tagihan_listrik_air');
            $table->string('dokumen_tanggungan');
            $table->string('foto_rumah');
            $table->string('surat_pendukung');
        });
    }

    public function down(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {

            $table->dropColumn([
                'ktm',
                'kartu_keluarga',
                'slip_gaji',
                'surat_tidak_beasiswa',
                'tagihan_listrik_air',
                'dokumen_tanggungan',
                'foto_rumah',
                'surat_pendukung',
            ]);

            $table->string('bukti')->nullable();
        });
    }
};