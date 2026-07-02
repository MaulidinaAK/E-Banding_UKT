

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Riwayat Verifikasi Dekan</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-success">

                <tr>

                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>

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
    <?php echo e($pengajuan->created_at->format('d M Y')); ?>

    <br>
    <small class="text-muted">
        <?php echo e($pengajuan->created_at->format('H:i')); ?> WIB
    </small>
</td>

                    <td>

                        <span class="badge bg-success">

                            <?php echo e($pengajuan->status); ?>


                        </span>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada riwayat verifikasi.

                    </td>

                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dekan/pengajuan/riwayat.blade.php ENDPATH**/ ?>