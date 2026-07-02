

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Detail Pengajuan Banding UKT</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="220">Nama Mahasiswa</th>
                <td><?php echo e($pengajuan->user->name); ?></td>
            </tr>

            <tr>
                <th>Semester</th>
                <td><?php echo e($pengajuan->semester); ?></td>
            </tr>

            <tr>
    <th>Tanggal Pengajuan</th>
    <td>
        <?php echo e($pengajuan->created_at->format('d F Y')); ?>

        pukul
        <?php echo e($pengajuan->created_at->format('H:i')); ?> WIB
    </td>
</tr>

            <tr>
                <th>UKT Saat Ini</th>
                <td>
                    Rp <?php echo e(number_format($pengajuan->ukt_sekarang,0,',','.')); ?>

                </td>
            </tr>

            <tr>
                <th>UKT Diajukan</th>
                <td>
                    Rp <?php echo e(number_format($pengajuan->ukt_pengajuan,0,',','.')); ?>

                </td>
            </tr>

            <tr>
                <th>Alasan</th>
                <td><?php echo e($pengajuan->alasan); ?></td>
            </tr>

            <tr>
                <th>Bukti Pendukung</th>
                <td>

                    <?php if($pengajuan->bukti): ?>

                        <a href="<?php echo e(asset('storage/'.$pengajuan->bukti)); ?>"
                           target="_blank"
                           class="btn btn-primary btn-sm">

                            Lihat Bukti

                        </a>

                    <?php else: ?>

                        <span class="text-danger">
                            Tidak ada file
                        </span>

                    <?php endif; ?>

                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    <span class="badge bg-warning">

                        <?php echo e($pengajuan->status); ?>


                    </span>

                </td>
            </tr>

        </table>

        <div class="mt-4">

           <?php if($pengajuan->status === 'Pending Dekan'): ?>

                <form action="<?php echo e(route('dekan.pengajuan.updateStatus', $pengajuan)); ?>"
                      method="POST"
                      class="d-inline">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <input type="hidden"
                           name="status"
                           value="Disetujui">

                    <button class="btn btn-success">
                        Setujui
                    </button>

                </form>

                <form action="<?php echo e(route('dekan.pengajuan.updateStatus', $pengajuan)); ?>"
                      method="POST"
                      class="d-inline">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <input type="hidden"
                           name="status"
                           value="Revisi">

                    <button class="btn btn-warning">
                        Revisi
                    </button>

                </form>

                <form action="<?php echo e(route('dekan.pengajuan.updateStatus', $pengajuan)); ?>"
                      method="POST"
                      class="d-inline">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <input type="hidden"
                           name="status"
                           value="Ditolak">

                    <button class="btn btn-danger">
                        Tolak
                    </button>

                </form>

            <?php endif; ?>

            <a href="<?php echo e(route('dekan.pengajuan.index')); ?>"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dekan/pengajuan/show.blade.php ENDPATH**/ ?>