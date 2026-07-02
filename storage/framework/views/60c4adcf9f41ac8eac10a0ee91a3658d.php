<?php $__env->startSection('sidebar'); ?>

<div class="list-group">

    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
       class="list-group-item list-group-item-action active">
        Dashboard
    </a>

    <a href="<?php echo e(route('pengajuan.create')); ?>"
       class="list-group-item list-group-item-action">
        Ajukan Banding
    </a>

    <a href="<?php echo e(route('pengajuan.index')); ?>"
       class="list-group-item list-group-item-action">
        Riwayat Pengajuan
    </a>

    <a href="<?php echo e(route('profile.show')); ?>"
       class="list-group-item list-group-item-action">
        Profil
    </a>

</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<h2 class="mb-4">
    Dashboard Mahasiswa
</h2>

<div class="alert alert-success">
    Selamat datang, <strong><?php echo e(auth()->user()->name); ?></strong>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Total Pengajuan</h5>
                <h2><?php echo e($totalPengajuan); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Status Terakhir</h5>

                <h2>
                   <?php switch($pengajuanTerakhir->status):

    case ('Pending TU'): ?>
       Verifikasi TU
        <?php break; ?>

    <?php case ('Pending Kaprodi'): ?>
         Verifikasi Kaprodi
        <?php break; ?>

    <?php default: ?>
        <?php echo e($pengajuanTerakhir->status); ?>


<?php endswitch; ?>
                </h2>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Maulidina Aisha K\Documents\KULIAH\4. Semester 4\Analisis dan Desain Sistem 4B\App E-Banding UKT\resources\views/dashboard/mahasiswa.blade.php ENDPATH**/ ?>