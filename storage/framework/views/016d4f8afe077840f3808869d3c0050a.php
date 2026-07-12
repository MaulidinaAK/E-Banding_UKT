

<?php $__env->startSection('content'); ?>

<div class="mb-3">

    <a href="<?php echo e(route('admin.dashboard')); ?>"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

<h2 class="mb-4">
    Riwayat Verifikasi Admin TU
</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>

                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($loop->iteration); ?></td>

                    <td><?php echo e($pengajuan->user->name); ?></td>

                    <td><?php echo e($pengajuan->semester); ?></td>

                    <td>
                        Rp <?php echo e(number_format($pengajuan->ukt_pengajuan,0,',','.')); ?>

                    </td>

                    <td>
    <?php
        $status = $pengajuan->status;

        $badgeClass = match($status) {
            'Disetujui' => 'status-success',
            'Ditolak' => 'status-danger',
            'Pending Kaprodi', 'Pending Dekan', 'Pending TU' => 'status-warning',
            default => 'status-secondary',
        };

        $icon = match($status) {
            'Disetujui' => 'bi-check-circle-fill',
            'Ditolak' => 'bi-x-circle-fill',
            default => 'bi-hourglass-split',
        };
    ?>

    <span class="status-badge <?php echo e($badgeClass); ?>">
        <i class="bi <?php echo e($icon); ?> me-1"></i>
        <?php echo e($status); ?>

    </span>
</td>

                    <td>

                        <a href="<?php echo e(route('admin.pengajuan.show',$pengajuan)); ?>"
                           class="btn btn-primary btn-sm">

                            Detail

                        </a>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada riwayat.

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/admin/pengajuan/riwayat.blade.php ENDPATH**/ ?>