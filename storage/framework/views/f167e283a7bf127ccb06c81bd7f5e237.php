

<?php $__env->startSection('content'); ?>

<div class="mb-3">

    <a href="<?php echo e(route('kaprodi.dashboard')); ?>"
       class="btn btn-sm btn-outline-primary">

        <i class="bi bi-arrow-left"></i>
        Dashboard

    </a>

</div>

<h2 class="mb-4">Verifikasi Pengajuan Banding UKT</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>

                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>UKT Diajukan</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>

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

                        <?php if($pengajuan->status == 'Pending Kaprodi'): ?>

                        <span class="badge bg-warning">
                        Pending Kaprodi
                        </span>

                        <?php elseif($pengajuan->status == 'Pending Dekan'): ?>

                        <span class="badge bg-primary">
                        Pending Dekan
                        </span>

                        <?php elseif($pengajuan->status == 'Revisi'): ?>

                        <span class="badge bg-secondary">
                        Revisi
                        </span>

                        <?php elseif($pengajuan->status == 'Ditolak'): ?>

                        <span class="badge bg-danger">
                        Ditolak
                        </span>

                        <?php else: ?>

                        <span class="badge bg-success">
                        <?php echo e($pengajuan->status); ?>

                        </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="<?php echo e(route('kaprodi.pengajuan.show',$pengajuan)); ?>"
                           class="btn btn-primary btn-sm">

                            Detail

                        </a>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada pengajuan.

                    </td>

                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/kaprodi/pengajuan/index.blade.php ENDPATH**/ ?>