

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
    Dashboard Kaprodi
</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong><?php echo e(auth()->user()->name); ?></strong>
</div>

<div class="row g-3 mb-3">

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Total Pengajuan</h6>
                <h3 class="mb-0"><?php echo e($totalPengajuan); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Menunggu Verifikasi</h6>
                <h3 class="mb-0"><?php echo e($pendingKaprodi); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Pending Dekan</h6>
                <h3 class="mb-0"><?php echo e($pendingDekan); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Revisi</h6>
                <h3 class="mb-0"><?php echo e($revisi); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border text-center h-100">
            <div class="card-body py-3">
                <h6 class="text-muted mb-2">Ditolak</h6>
                <h3 class="mb-0"><?php echo e($ditolak); ?></h3>
            </div>
        </div>
    </div>

</div>

<div class="mt-4">

    <a href="<?php echo e(route('kaprodi.pengajuan.index')); ?>"
       class="btn btn-primary">

        Verifikasi Pengajuan

    </a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/kaprodi.blade.php ENDPATH**/ ?>