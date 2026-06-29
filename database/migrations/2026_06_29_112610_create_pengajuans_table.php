<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('semester');

            $table->decimal('ukt_sekarang', 10, 2);

            $table->decimal('ukt_pengajuan', 10, 2);

            $table->text('alasan');

            $table->enum('status', [
                'Pending TU',
                'Pending Kaprodi',
                'Pending Dekan',
                'Revisi',
                'Ditolak',
                'Disetujui'
            ])->default('Pending TU');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};