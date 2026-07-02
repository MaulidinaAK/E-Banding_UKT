

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Dashboard Admin TU</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong><?php echo e(auth()->user()->name); ?></strong>
</div>

<div class="row g-3">

    <div class="col-md-4">
        <div class="stat-card blue">
            <div>
                <h6>Total Pengajuan</h6>
                <h3><?php echo e($totalPengajuan); ?></h3>
            </div>
            <i class="bi bi-inbox stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card yellow">
            <div>
                <h6>Pending Verifikasi</h6>
                <h3><?php echo e($pending); ?></h3>
            </div>
            <i class="bi bi-hourglass-split stat-icon"></i>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card green">
            <div>
                <h6>Disetujui</h6>
                <h3><?php echo e($disetujui); ?></h3>
            </div>
            <i class="bi bi-check-circle stat-icon"></i>
        </div>
    </div>

</div>

<div class="mt-4">

    <a href="<?php echo e(route('admin.pengajuan.index')); ?>"
       class="btn btn-primary">

        Kelola Pengajuan

    </a>

    <a href="<?php echo e(route('admin.riwayat')); ?>"
   class="btn btn-success">
    Riwayat
</a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>