<?php $__env->startSection('sidebar'); ?>

<div class="list-group">

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="list-group-item list-group-item-action">
        Dashboard
    </a>

    <a href="<?php echo e(route('pengajuan.index')); ?>"
       class="list-group-item list-group-item-action active">
        Pengajuan Banding
    </a>

    <a href="<?php echo e(route('profile.show')); ?>"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-3">

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>


<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="mb-0">
        Daftar Pengajuan Banding UKT
    </h2>


    <a href="<?php echo e(route('pengajuan.create')); ?>"
       class="btn btn-primary">

        + Ajukan Banding

    </a>

</div>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">

       <table class="table table-bordered table-hover table-card">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Semester</th>
                    <th>UKT Saat Ini</th>
                    <th>UKT Diajukan</th>
                    <th>Dokumen</th>
                     <th>Tanggal Pengajuan</th>
                    <th>Status</th> 
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        <td><?php echo e($pengajuan->semester); ?></td>

                        <td>Rp <?php echo e(number_format($pengajuan->ukt_sekarang,0,',','.')); ?></td>

                        <td>Rp <?php echo e(number_format($pengajuan->ukt_pengajuan,0,',','.')); ?></td>

                       <td>

    <?php
        $jumlahDokumen = collect([
            $pengajuan->ktm,
            $pengajuan->kartu_keluarga,
            $pengajuan->slip_gaji,
            $pengajuan->surat_tidak_beasiswa,
            $pengajuan->tagihan_listrik_air,
            $pengajuan->dokumen_tanggungan,
            $pengajuan->foto_rumah,
            $pengajuan->surat_pendukung,
        ])->filter()->count();
    ?>

    <?php if($jumlahDokumen > 0): ?>

        <span class="badge bg-success">
            <?php echo e($jumlahDokumen); ?> Dokumen
        </span>

    <?php else: ?>

        <span class="badge bg-danger">
            Tidak Ada
        </span>

    <?php endif; ?>

</td>

                      <td>
        <?php echo e($pengajuan->created_at->format('d M Y')); ?>

        <br>
        <small class="text-muted">
            <?php echo e($pengajuan->created_at->format('H:i')); ?> WIB
        </small>
    </td>

                    <td><?php switch($pengajuan->status):

    case ('Pending TU'): ?>
        Menunggu Verifikasi TU
        <?php break; ?>

    <?php case ('Pending Kaprodi'): ?>
        Menunggu Verifikasi Kaprodi
        <?php break; ?>

    <?php default: ?>
        <?php echo e($pengajuan->status); ?>


<?php endswitch; ?>

</td>

<td>

    <a href="<?php echo e(route('pengajuan.show', $pengajuan->id)); ?>"
       class="btn btn-outline-primary btn-sm">

        <i class="bi bi-eye"></i>
        Detail

    </a>

</td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada pengajuan.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/mahasiswa/pengajuan/index.blade.php ENDPATH**/ ?>