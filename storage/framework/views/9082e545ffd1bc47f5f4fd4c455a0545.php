

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
    Dashboard Kaprodi
</h2>

<div class="alert alert-success">
    Selamat datang,
    <strong><?php echo e(auth()->user()->name); ?></strong>
</div>

<div class="row g-3">

    <!-- Total Pengajuan -->
    <div class="col-md-4">
        <div class="stat-card dark">
            <div>
                <h6>Total Pengajuan</h6>
                <h3><?php echo e($totalPengajuan); ?></h3>
            </div>
            <i class="bi bi-folder stat-icon"></i>
        </div>
    </div>

    <!-- Menunggu Verifikasi -->
    <div class="col-md-4">
        <div class="stat-card yellow">
            <div>
                <h6>Menunggu Verifikasi</h6>
                <h3><?php echo e($pendingKaprodi); ?></h3>
            </div>
            <i class="bi bi-hourglass stat-icon"></i>
        </div>
    </div>


    <!-- Disetujui -->
    <div class="col-md-4">
        <div class="stat-card green">
            <div>
                <h6>Disetujui Kaprodi</h6>
                <h3><?php echo e($approved); ?></h3>
            </div>
            <i class="bi bi-check2-circle stat-icon"></i>
        </div>
    </div>

    <!-- Ditolak -->
    <div class="col-md-4">
        <div class="stat-card red">
            <div>
                <h6>Ditolak</h6>
                <h3><?php echo e($ditolak); ?></h3>
            </div>
            <i class="bi bi-x-circle stat-icon"></i>
        </div>
    </div>

    <!-- Revisi -->
    <div class="col-md-4">
        <div class="stat-card orange">
            <div>
                <h6>Revisi</h6>
                <h3><?php echo e($revisi); ?></h3>
            </div>
            <i class="bi bi-pencil-square stat-icon"></i>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/kaprodi.blade.php ENDPATH**/ ?>